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
}/*
try{
	$r = load_config("configurationfds.xml","configuration.xsd");	
}catch(InvalidArgumentException $e){
	echo $e->getMessage();
}
try{
	$r = load_config("configuration.xml","configuration.xsd");	
	var_dump($r);
}catch(InvalidArgumentException $e){
	echo $e->getMessage();
}
*/

function check_user($name, $password){
	$res = load_config(dirname(__FILE__)."/configuration.xml", dirname(__FILE__)."/configuration.xsd");
	$db = new PDO($res[0], $res[1], $res[2]);
	$ins = "select codRes, mail from restaurants where mail = '$name' 
			and password = '$password'";
	$resul = $db->query($ins);	
	if($resul->rowCount() === 1){		
		return $resul->fetch();		
	}else{
		return FALSE;
	}
}/*
echo "<br>";
try{
	$r = check_user("madrid1@empresa.com", "12345");	
	var_dump($r);
	echo "<br>";
}catch(Exception $e){
	echo $e->getMessage();
}
echo "<br>";
try{
	$r = check_user("madrid1@empresa.com", "1234");	
	var_dump($r);
}catch(Exception $e){
	echo $e->getMessage();
}
echo "<br>";
try{
	$r = check_user("madrid1@emprerrsa.com", "12345");	
	var_dump($r);
}catch(Exception $e){
	echo $e->getMessage();
}
*/
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
/*
echo "<br>";

$r = load_categories();
foreach($r as $element){
	print_r($element);
}
echo "<br>";

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
echo "<br>";	 
$r = load_products_category(2);
foreach($r as $element){
	print_r($element);
	echo "<br>";	 
}
echo "<br>";

$r = load_products_category(7);
var_dump($r);
echo "<br>";

*/
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
}/*
echo "<br>";	 
$r = load_category(2);
print_r($r);
echo "<br>";
$r = load_category(7);
var_dump($r);
echo "<br>";*/







