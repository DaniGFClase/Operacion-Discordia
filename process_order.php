<?php
	//require 'mail.php';
	require 'sessions.php';
	require_once 'db.php';
	check_session();
?>	
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Orders</title>		
	</head>
	<body>
	<?php 
	require 'header.php';			
	$resul = insert_order($_SESSION['cart'], $_SESSION['user']['codRes']);
	if($resul === FALSE){
		echo "Order could not be processed<br>";			
	}else{
		$mail = $_SESSION['user']['mail'];
		echo "Order processed succesfully. A confirmation mail will be sent to: $mail ";							
		/*$conf = send_mails($_SESSION['cart'], $resul, $mail);							
		if($conf!==TRUE){
			echo "Error sending: $conf <br>";
		};*/				
		$_SESSION['cart'] = [];

		}		
	?>		
	</body>
</html>
	