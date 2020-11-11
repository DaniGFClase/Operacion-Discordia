<?php

function load_config($name, $schema){
	$config = new DOMDocument();
	$config->load($name);
	$res = $config->schemaValidate($schema);
	if ($res===FALSE){ 
	   throw new InvalidArgumentException("Check configuration file");
	} 		
	$data = simplexml_load_file($name);	
	$ip = $data->xpath("//ip");
	$name = $data->xpath("//name");
	$user = $data->xpath("//user");
	$password = $data->xpath("//password");	
	$conn_string = sprintf("mysql:dbname=%s;host=%s", $name[0], $ip[0]);
	$result = [];
	$result[] = $conn_string;
	$result[] = $user[0];
	$result[] = $password[0];
	return $result;
}

function check_user($nick, $password){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$ins = "select cod_user from user where (name = '$nick' or mail ='$nick')";
	
	
	$resul = $db->query($ins);

	if($resul->rowCount() === 1){	

		$hash = "select password_hash from user where (nick = '$nick' or mail ='$nick')";
		$hash_resul = $db->query($hash);
		$pass = $hash_resul->fetch();
		$pass_hash = $pass['password_hash'];

		if(password_verify($password, $pass_hash)){		
			return $resul->fetch();	
		}else{
			return FALSE;
		}	

	}else{
	return FALSE;
	}		

}

function register_user($name, $surname, $nick, $email, $password, $gender){
	
        $res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
		$db = new PDO($res[0], $res[1], $res[2]);

		$password_hash = password_hash($password, PASSWORD_DEFAULT);

		$ins = "INSERT INTO `user` 
		(`cod_user`, `name`, `surname`, `nick`, `mail`, `photo`, `password_hash`, `description`, `gender`) VALUES 
		(NULL, '$name', '$surname', '$nick', '$email', '', '$password_hash', '', '$gender')";

		$resul = $db->query($ins);
		
		if (!$resul) {
			return FALSE;
		}
		
		return $resul;

}

function send_Message($myUser, $toUser, $message){


	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);

	$severalUser = explode(" ", $toUser);

	foreach ($severalUser as $toUser ) {
		$insCod = "select cod_user from user 
	where nick like '$toUser'";
	$resulCod = $db->query($insCod);
	$CodResult = $resulCod->fetch();

	$ins = "select count(*) as count, group_concat(cod_user separator ',') as users, cod_room
    from user_room 
    group by cod_room
    having count like 2";
	
    $resul = $db->query($ins);
    $result = $db->query($ins);
    $r = $resul->fetch();
    

    if (!$r) {
        createTable ($myUser, $CodResult[0]);
    }

    $cod_room = "";
    foreach($result as $re){	

       if ($re['users']==($myUser.",".$CodResult[0]) || $re['users']==($CodResult[0].",".$myUser)) {
        $cod_room = $re['cod_room'];
       }else {
        createTable($myUser, $CodResult[0]);
       }
    }

    

    $ins = "INSERT INTO `message` (`cod_message`, `cod_user`, `text_message`, `date_message`, `cod_room`) VALUES (NULL, '$myUser', '$message', current_timestamp(), '$cod_room')";
	
    $result = $db->query($ins);
	}

	

}

function createTable ($userA, $userB){
    $res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
    $db = new PDO($res[0], $res[1], $res[2]);
    
    $ins = " INSERT INTO `room` (`cod_room`, `name_room`) VALUES ('$userA-$userB', '')"; 
    $resul = $db->query($ins);

    $ins = " INSERT INTO `user_room` (`cod_user`, `cod_room`) VALUES ('$userA', '$userA-$userB'), ('$userB', '$userA-$userB')"; 
    $resul = $db->query($ins);
}


function load_room($cod){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$ins = "select u.cod_user as codUser, nick, photo, count(*) as count, ur.cod_room as codRoom, img_room from user as u
	join user_room as ur
	on u.cod_user = ur.cod_user
    join room as r
    on r.cod_room = ur.cod_room
	where ur.cod_room in
	(select ur.cod_room from user as u
	join user_room as ur
	on u.cod_user = ur.cod_user
	where u.cod_user like $cod
	group by ur.cod_room)
	and u.cod_user not like $cod
	group by ur.cod_room";
	$resul = $db->query($ins);	
	if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {    
		return FALSE;
    }
	//if there is one or more
	return $resul;	
}


function load_chat($cod){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$ins = "select u.cod_user as codUser, nick, photo, cod_room as codRoom, text_message, date_message from user as u
    join message as m
    on u.cod_user = m.cod_user
	where m.cod_room like '$cod'
	order by date_message"
	;
	
	$resul = $db->query($ins);	
	if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {    
		return FALSE;
    }
	return $resul;	
}


function send_chat_Message($myUser, $room, $message){


	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	   

    $ins = "INSERT INTO `message` (`cod_message`, `cod_user`, `text_message`, `date_message`, `cod_room`) VALUES (NULL, '$myUser', '$message', current_timestamp(), '$room');";
	
    $result = $db->query($ins);

}

function create_group($myUser, $toUser, $name_group,  $message){


	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);

	$severalUser = explode(" ", $toUser);

	$ins = "select * from room
	where cod_room like '$name_group'";
	
	$resul = $db->query($ins);
	
		if ($resul->rowCount() !== 0) {    
		return FALSE;
		
	}
	
	$ins = "INSERT INTO `room` (`cod_room`, `img_room`) VALUES ('$name_group', 'default_group.jpg')";
	
	$result = $db->query($ins);
	

	$ins = "INSERT INTO `user_room` (`cod_user`, `cod_room`) VALUES ('$myUser', '$name_group')";
	
	$result = $db->query($ins);
	
	


	foreach ($severalUser as $toUser ) {
		
	$insCod = "select cod_user from user 
	where nick like '$toUser'";
	$resulCod = $db->query($insCod);
	$CodResult = $resulCod->fetch();

	$ins = "INSERT INTO `user_room` (`cod_user`, `cod_room`) VALUES ('$CodResult[0]', '$name_group')";
	
	$result = $db->query($ins);
	
	}

	$ins = "INSERT INTO `message` (`cod_message`, `cod_user`, `text_message`, `date_message`, `cod_room`) VALUES (NULL, '$myUser', '$message', current_timestamp(), '$name_group')";
	
    $result = $db->query($ins);

	header ('Location: main.php');

}
