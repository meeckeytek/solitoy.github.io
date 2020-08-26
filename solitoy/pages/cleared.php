<?php
include'../includes/connection.php';

	if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
		$query = 'SELECT *, FIRST_NAME, LAST_NAME
		FROM transaction T
		JOIN customer C ON T.`CUST_ID`=C.`CUST_ID` WHERE PAID > 0
		ORDER BY TRANS_D_ID ASC';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));

	  while ($row = mysqli_fetch_assoc($result)) {
				  
  $pay=$row['GRANDTOTAL'];
	  }
    			$query = 'UPDATE transaction set CASH="'.$pay.'", PAID=0 WHERE TRANS_ID = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("Customer Outstanding Cleared Successfully.");window.location = "oustandings.php";</script>					
            <?php
    			//break;
            
	}
?>