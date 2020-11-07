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
		<title>Products by category</title>		
	</head>
	<body>
		<?php 
		// for exercise 1
		$_SESSION['lastcat'] = $_GET['category'] ;
		require 'header.php';
		$cat = load_category($_GET['category']);
		$products = load_products_category($_GET['category']);		
		if($cat=== FALSE or $products === FALSE){
			echo "<p class='error'>Error connecting to the database or no products present</p>";
			exit;
		}
		echo "<h1>". $cat['name']. "</h1>";
		echo "<p>". $cat['description']."</p>";		
		echo "<table>"; 
		echo "<tr><th>Name</th><th>Description</th><th>Weight</th><th>Stock</th><th>Buy</th></tr>";
		foreach($products as $product){
			$cod = $product['CodProd'];
			$name = $product['Name'];
			$des = $product['Description'];
			$weight = $product['Weight'];
			$stock = $product['Stock'];	
			if($stock > 0){
				echo "<tr><td>$name</td><td>$des</td><td>$weight</td><td>$stock</td>
				<td><form action = 'add.php' method = 'POST'>
				<input name = 'units' type='number' min = '1' value = '1'>
				<input type = 'submit' value='Buy'><input name = 'cod' type='hidden' value = '$cod'>
				</form></td></tr>";
			}
		}
		echo "</table>"			
		?>				
	</body>
</html>