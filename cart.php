<?php 
	require_once 'sessions.php';
	require_once 'db.php';
	check_session();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Cart</title>		
	</head>
	<body>
		
		<?php 
		require 'header.php';			
		$products = load_products(array_keys($_SESSION['cart']));
		if($products === FALSE){
			echo "<p>There are no products in the cart</p>";
			exit;
		}
		echo "<h2>Cart</h2>";
		echo "<table>"; //
		echo "<tr><th>Name</th><th>Description</th><th>Weight</th><th>Units</th><th>Remove</th></tr>";
		foreach($products as $product){
			$cod = $product['CodProd'];
			$nom = $product['Name'];
			$des = $product['Description'];
			$weight = $product['Weight'];
			$units = $_SESSION['cart'][$cod];								
			
			//print_r($product);				
			echo "<tr><td>$nom</td><td>$des</td><td>$weight</td><td>$units</td>
			<td><form action = 'remove.php' method = 'POST'>
			<input name = 'units' type='number' min = '1' value = '1'>
			<input type = 'submit' value='Remove'>
			<input name = 'cod' type='hidden' value = '$cod'>  </form></td></tr>";	
		}
		echo "</table>";						
		?>
		<hr>
		<!-- activity 5 -->
		<a href = "process_order_conf.php">Process order</a>	
	</body>
</html>
