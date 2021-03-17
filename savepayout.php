<?php
include'./includes/connection.php';
?>
 <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $supplier = $_POST['supplier'];
			  $rno = $_POST['rno'];
			   $paytype = $_POST['paytype'];
              $rdate = $_POST['rdate'];
			   $paid = $_POST['paid'];
			    $discount = $_POST['discount'];
				 $total = $_POST['total'];
              $description = $_POST['description'];
			            
             if($discount==''){$discount=0;}
             if($description==''){$description=0;}     
			 
              switch($_GET['action']){
                case 'add':  
             
                    $query = "INSERT INTO payout
                              (payout_id,supplier_id ,rno, rdate, paytype, paid,discount,total,description)
                              VALUES (Null,'{$supplier}','{$rno}','{$rdate}','{$paytype}','{$paid}','{$discount}','{$total}','{$description}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                    
                break;
              }
            ?>
              <script type="text/javascript">
			  alert("You've Added Record  Successfully.");
			  window.location = "payout.php";</script>
          </div>



<?php
include './includes/footer.php';
?>