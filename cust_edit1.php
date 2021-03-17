<?php
include('./includes/connection.php');
			$zz = $_POST['id'];
			$fname= $_POST['efull_name'];
			$addr=$_POST['eaddress'];
			$cname=$_POST['econtact_name'];
			$cno=$_POST['econtact_no'];
			$cemail=$_POST['econtact_email'];
			$gstno=$_POST['egstno'];
		
	 			$query = 'UPDATE customer set full_name ="'.$fname.'",
					address ="'.$addr.'", contact_name="'.$cname.'", contact_no="'.$cno.'", contact_email="'.$cemail.'", gstno="'.$gstno.'" WHERE
					CUST_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("You've Update Customer Successfully.");
			window.location = "customer.php";
		</script>