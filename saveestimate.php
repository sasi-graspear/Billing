<?php
include'./includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
			
              $cus = $_POST['customer'];
			  $rno = $_POST['rno'];
              $edate = $_POST['edate'];
              $state = $_POST['state']; 
			  $tamount = $_POST['tamount'];
			  $discount = $_POST['discount'];
			  $stotal = $_POST['sub_total'];
			  $taxamount = $_POST['tax_amount'];
			 
			
			
 //if null value means also store the table coding
if($discount==''){$discount=0;}
//Inserting Coding 
                    
              switch($_GET['action'])
			  {
                case 'add':  
             
                    $query = "INSERT INTO estimate(estimate_id,customer_id,rno,edate,state_id,total_amount,discount,sub_total,tax_amount)							  
                              VALUES
							  (Null,'{$cus}','{$rno}','{$edate}','{$state}','{$tamount}','{$discount}','{$stotal}','{$taxamount}')";
                    mysqli_query($db,$query)or die ('Error in updating supplier details in Database '.$query);
					$estimateid = mysqli_insert_id($db);
					
			   // Item Inserting Coding
                    
					 for ($a = 0; $a < count($_POST["qty"]); $a++)
				 	 {
					$query1 = "INSERT INTO estock(stock_id, product, estimate_id, qty, price, gst, gst_amount,total,description)							  
                              VALUES
							  (Null,'" . $_POST["product"][$a] . "','{$estimateid}','" . $_POST["qty"][$a] . "','" . $_POST["price"][$a] . "','" . $_POST["gst"][$a] . "','" . $_POST["gstamount"][$a] . "','" . $_POST["total"][$a] . "','" . $_POST["desc"][$a] . "')";
                    mysqli_query($db,$query1)or die ('Error in updating supplier details in Database '.$query1);
					 }
					
                break;
              }
            ?>
              <script type="text/javascript">
			  alert("You've Added Record  Successfully.");
			  window.location = "estimate.php";</script>
          </div>

<?php
include'./includes/footer.php';
?>