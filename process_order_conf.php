<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'sessions.php';
	require_once 'db.php';
	check_session();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Order confirmation</title>		
	</head>
	<body>
		<p> Do you really want to proceed with the order?</p>
		<a href ="process_order.php">Yes</a>
		<a href ="cart.php">No</a>
	</body>
</html>