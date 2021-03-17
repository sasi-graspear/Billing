<?php
include'./includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
			
              $cus = $_POST['customer'];
			  $ono = $_POST['ono'];
              $odate = $_POST['odate'];
			  $ddate = $_POST['ddate'];
			   $state = $_POST['state'];              	 
			  $ptype = $_POST['paytype']; 
			  
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
             
                    $query = "INSERT INTO sorder(sorder_id,customer_id,ono,odate,ddate,state_id,paytype,tamount,discount,sub_total,tax_amount)							  
                              VALUES
							  (Null,'{$cus}','{$ono}','{$odate}','{$ddate}','{$state}','{$ptype}','{$tamount}','{$discount}','{$stotal}','{$taxamount}')";
                    mysqli_query($db,$query)or die ('Error in updating supplier details in Database '.$query);
					$sorderid = mysqli_insert_id($db);
					
			   // Item Inserting Coding
                    
					 for ($a = 0; $a < count($_POST["qty"]); $a++)
				 	 {
					$query1 = "INSERT INTO sostock(stock_id, product, sorder_id, qty, price, gst, gst_amount,total,description)							  
                              VALUES
							  (Null,'" . $_POST["product"][$a] . "','{$sorderid}','" . $_POST["qty"][$a] . "','" . $_POST["price"][$a] . "','" . $_POST["gst"][$a] . "','" . $_POST["gstamount"][$a] . "','" . $_POST["total"][$a] . "','" . $_POST["desc"][$a] . "')";
                    mysqli_query($db,$query1)or die ('Error in updating supplier details in Database '.$query1);
					 }
					
                break;
              }
            ?>
              <script type="text/javascript">
			  alert("You've Added Record  Successfully.");
			  window.location = "sorder.php";</script>
          </div>

<?php
include'./includes/footer.php';
?>