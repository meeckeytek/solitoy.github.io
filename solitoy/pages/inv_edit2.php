<?php
include('../includes/connection.php');
          $zz = $_POST['idd'];
             $bss=$_POST['outstanding']-$_POST['new'];
             $cbn = $_POST['oh']+$_POST['new'];
		
        $query = 'UPDATE transaction set CASH="'.$cbn.'", PAID="'.$bss.'" WHERE TRANS_ID ="'.$zz.'"';
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>	
	<script type="text/javascript">
			alert("You've Update Payment Successfully.");
			window.location = "oustandings.php";
		</script>