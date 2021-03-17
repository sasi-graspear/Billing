<?php
include'./includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
			
              $cus = $_POST['customer'];
			  $pno = $_POST['pno'];
              $pdate = $_POST['pdate'];
              $ewayno = $_POST['ewayno'];
			  $ino = $_POST['ino'];
              $idate = $_POST['idate']; 
			  $pterms = $_POST['pterms']; 
			  $ddate = $_POST['ddate']; 
			  $state = $_POST['state']; 
			  $ptype = $_POST['ptype']; 
              $gsttype = $_POST['gsttype']; 
			  $tamount = $_POST['tamount'];
			  $discount = $_POST['discount'];
			  $stotal = $_POST['sub_total'];
			  $taxamount = $_POST['tax_amount'];
			 
			
			
 //if null value means also store the table coding
if($pno==''){$pno=0;}
if($pdate==''){$pdate=null;}
if($ewayno==''){$ewayno=0;}
if($ddate==''){$ddate=null;}
if($discount==''){$discount=0;}
//Inserting Coding 
                    
              switch($_GET['action'])
			  {
                case 'add':  
             
                    $query = "INSERT INTO sales(sales_id,customer_id,po_no,po_date,eway_no,bill_no,bill_date,payment_terms,due_date,state_id,payment_type,
							  gsttype,total_amount,discount,sub_total,tax_amount)							  
                              VALUES
							  (Null,'{$cus}','{$pno}','{$pdate}','{$ewayno}','{$ino}','{$idate}','{$pterms}','{$ddate}','{$state}','{$ptype}','{$gsttype}','{$tamount}','{$discount}','{$stotal}','{$taxamount}')";
                    mysqli_query($db,$query)or die ('Error in updating supplier details in Database '.$query);
					$salesid = mysqli_insert_id($db);
					
			   // Item Inserting Coding
                    
					 for ($a = 0; $a < count($_POST["qty"]); $a++)
				 	 {
					$query1 = "INSERT INTO sstock(stock_id, product_id, sales_id, qty, price, gst, gst_amount,total,serial)							  
                              VALUES
							  (Null,'" . $_POST["product"][$a] . "','{$salesid}','" . $_POST["qty"][$a] . "','" . $_POST["price"][$a] . "','" . $_POST["gst"][$a] . "','" . $_POST["gstamount"][$a] . "','" . $_POST["total"][$a] . "','" . $_POST["serial"][$a] . "')";
                    mysqli_query($db,$query1)or die ('Error in updating supplier details in Database '.$query1);
					 }
					
                break;
              }
			  

            ?>
              <script type="text/javascript">
			  alert("You've Added Record  Successfully.");
			  window.location = "sales.php";</script>
          </div>

<?php
include'./includes/footer.php';
?>