<?php
include('./includes/connection.php');
			$zz = $_POST['id'];
			$sname = $_POST['esname'];
            $cperson = $_POST['ecperson'];
            $address = $_POST['eaddress'];
            $cno = $_POST['econtactno'];
			$cmail = $_POST['econtactmail'];
			$gstno = $_POST['egstno'];
		
	 			$query = 'UPDATE suppliers set 
				supplier_name="'.$sname.'",
				contact_person="'.$cperson.'",
				supplier_address ="'.$address.'",				
				supplier_contact="'.$cno.'",
				contact_mail="'.$cmail.'",
				gst_no="'.$gstno.'" WHERE
					supplier_id ="'.$zz.'"'; 
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Update Supplier Successfully.");
			window.location = "supplier.php";
		</script>