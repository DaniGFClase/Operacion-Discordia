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

function send_Message(){

    $userA = 3;
    $userB = 4;
    $userC = 5;

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
        createTable ($userA, $userB);
    }

    foreach($result as $re){	

       if ($re['users']==($userA.",".$userB) || $re['users']==($userB.",".$userA)) {
           echo $re['cod_room'];
       }else {
        createTable($userA, $userB);
       }
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

send_Message();