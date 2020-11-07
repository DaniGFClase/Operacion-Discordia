<?php 

require_once 'sessions.php';
check_session();
$cod = $_POST['cod'];
$units = (int)$_POST['units'];
if(isset($_SESSION['cart'][$cod])){
	$_SESSION['cart'][$cod] += $units;
}else{
	$_SESSION['cart'][$cod] = $units;		
}
// for exercise 1
header("Location: products.php?category=" . $_SESSION['lastcat']);
