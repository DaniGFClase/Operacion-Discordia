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
		<title>Categories</title>
	</head>
	<body>
		<?php require 'header.php';?>
		<h1>Categories</h1>				
		<?php
		$categories = load_categories();
		if($categories===false){
			echo "<p class='error'>Error connecting to the database, or no categories present</p>";
		}else{
			echo "<ul>"; 
			foreach($categories as $cat){	
			
				$url = "products.php?category=".$cat['codCat'];
				echo "<li><a href='$url'>".$cat['name']."</a></li>";
			}
			echo "</ul>";
		}
		?>
	</body>
</html>