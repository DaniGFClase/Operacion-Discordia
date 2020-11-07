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

send_Message(17, 4, "te exploto payaso");