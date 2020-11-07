<?php 
require_once 'sessions.php';
check_session();
$cod = $_POST['cod'];
$units = $_POST['units'];
if(isset($_SESSION['cart'][$cod])){		
	$_SESSION['cart'][$cod] -= $units;
	if($_SESSION['cart'][$cod] <= 0){
		unset($_SESSION['cart'][$cod]);
	}	
}
header("Location: cart.php");
