<?php
include('../includes/connection.php');
			$pc = $_POST['PRODUCT_CODE'];
		
	 			$query = 'DELETE FROM product WHERE PRODUCT_CODE ="'.$pc.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "product.php";
		</script>