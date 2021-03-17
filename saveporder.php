<?php
include'./includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
			
              $sup = $_POST['supplier'];
			  $ono = $_POST['ono'];
              $odate = $_POST['odate'];
			  $ddate = $_POST['ddate'];
			   $state = $_POST['state']; 
             	 
			  $ptype = $_POST['ptype']; 
              $stotal = $_POST['sub_total'];
			  $taxamount = $_POST['tax_amount'];
			  $tamount = $_POST['tamount'];
			  $discount = $_POST['discount'];
			  
			 
			
			
 //if null value means also store the table coding
if($ddate==''){$ddate=null;}
if($discount==''){$discount=0;}
//Inserting Coding 
                    
              switch($_GET['action'])
			  {
                case 'add':  
             
                    $query = "INSERT INTO porder(porder_id,supplier_id,ono,odate,ddate,state_id,paytype,tamount,discount,sub_total,tax_amount)							  
                              VALUES
							  (Null,'{$sup}','{$ono}','{$odate}','{$ddate}','{$state}','{$ptype}','{$tamount}','{$discount}','{$stotal}','{$taxamount}')";
                    mysqli_query($db,$query)or die ('Error in updating supplier details in Database '.$query);
					$porderid = mysqli_insert_id($db);
					
			   // Item Inserting Coding
                    
					 for ($a = 0; $a < count($_POST["qty"]); $a++)
				 	 {
					$query1 = "INSERT INTO postock(postock_id, product, porder_id, qty, price, gst, gst_amount,total,description)							  
                              VALUES
							  (Null,'" . $_POST["product"][$a] . "','{$porderid}','" . $_POST["qty"][$a] . "','" . $_POST["price"][$a] . "','" . $_POST["gst"][$a] . "','" . $_POST["gstamount"][$a] . "','" . $_POST["total"][$a] . "','" . $_POST["desc"][$a] . "')";
                    mysqli_query($db,$query1)or die ('Error in updating supplier details in Database '.$query1);
					 }
					
                break;
              }
            ?>
              <script type="text/javascript">
			  alert("You've Added Record  Successfully.");
			  window.location = "porder.php";</script>
          </div>

<?php
include'./includes/footer.php';
?>