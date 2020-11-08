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
	$ins = "select cod_User from user where (name = '$nick' or mail ='$nick')";
	
	
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
	$ins = "select count(*) as count, group_concat(cod_user separator ',') as users, cod_room
    from user_room 
    group by cod_room
    having count like 2";
	
    $resul = $db->query($ins);
    $result = $db->query($ins);
    $r = $resul->fetch();
    

    if (!$r) {
        createTable ($myUser, $toUser);
    }

    $cod_room = "";
    foreach($result as $re){	

       if ($re['users']==($myUser.",".$toUser) || $re['users']==($toUser.",".$myUser)) {
        $cod_room = $re['cod_room'];
       }else {
        createTable($myUser, $toUser);
       }
    }

    

    $ins = "INSERT INTO `message` (`cod_message`, `cod_user`, `text_message`, `date_message`, `cod_room`) VALUES (NULL, '$myUser', '$message', current_timestamp(), '$cod_room')";
	
    $result = $db->query($ins);

}

function createTable ($userA, $userB){
    $res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
    $db = new PDO($res[0], $res[1], $res[2]);
    
    $ins = " INSERT INTO `room` (`cod_room`, `name_room`) VALUES ('$userA-$userB', '')"; 
    $resul = $db->query($ins);

    $ins = " INSERT INTO `user_room` (`cod_user`, `cod_room`) VALUES ('$userA', '$userA-$userB'), ('$userB', '$userA-$userB')"; 
    $resul = $db->query($ins);
}




function load_categories(){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$ins = "select codCat, name from categories";
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

function load_category($codCat){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$ins = "select name, description from categories where codcat = $codCat";
	$resul = $db->query($ins);	
	if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {    
		return FALSE;
    }	
	//if there is one or more
	return $resul->fetch();	
}
function load_products_category($codCat){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);	
	$sql = "select * from products where category  = $codCat";	
	$resul = $db->query($sql);	
	if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {    
		return FALSE;
    }	
	//if there is one or more
	return $resul;			
}
function load_products($codes){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$texto_in = implode(",", $codes);
	$ins = "select * from products where codProd in($texto_in)";
	$resul = $db->query($ins);	
	if (!$resul) {
		return FALSE;
	}
	return $resul;	
}


function insert_order($cart, $codRes){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$db->beginTransaction();	
	$hour = date("Y-m-d H:i:s", time());
	// insert order
	$sql = "insert into orders(Date, Sent, Restaurant) 
			values('$hour',0, $codRes);";
	$resul = $db->query($sql);	
	if (!$resul) {
		return FALSE;
	}
	// take id of new order for the detail rows
	$order = $db->lastInsertId();
	// inser rows in orderproducts
	foreach($cart as $codProd=>$units){
		$sql = "insert into orderproducts(`Order`, Product, Units) 
		             values($order, $codProd, $units)";			
		$resul = $db->query($sql);			
		if (!$resul) {
			echo $sql . "<br>";
			print_r($db->errorInfo());
			$db->rollback();
			return FALSE;
		}		
		$sql = "update products set stock = stock - $units
		             where codProd = $codProd";			
		$resul = $db->query($sql);			
		if (!$resul) {
			$db->rollback();
			return FALSE;
		}
	}
	$db->commit();
	return $order;
}













