<?php
include'../includes/connection.php';

	if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
    	switch ($_GET['type']) {
    		case 'supplier':
    			$query = 'DELETE FROM supplier WHERE SUPPLIER_ID = ' . $_GET['id'];
    			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));				
            ?>
    			<script type="text/javascript">alert("Supplier Successfully Deleted.");window.location = "supplier.php";</script>					
            <?php
    			//break;
            }
	}
?>