<?php
$connection_string = 'mysql:dbname=company;host=127.0.0.1';
$user = 'root';
$password = '';

$nombre = 'daniel.gil5';
$contra = '1234';
try {
    $bd = new PDO($connection_string, $user, $password);
	echo "Connected<br>";		
	$sql = 'SELECT name, email, password, role FROM users';
	$users = $bd->query($sql);
	echo "Number of users: " . $users->rowCount() . "<br>";
	foreach ($users as $usu) {
		print "name : " . $usu['name'] . "<br>";
        print "password : " . $usu['password'] . "<br>";
        print "email : " . $usu['email'] . "<br>";
	}
	
} catch (PDOException $e) {
	echo 'Database error:' . $e->getMessage();
}