<?php
include './includes/sidebar.php';
include'./includes/connection.php';
?>
 <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $hsnc = $_POST['hsnc'];
			  $cat = $_POST['category'];
              $pname = $_POST['pname'];
              $desc = $_POST['description'];
			  $stock = $_POST['stock'];           
             
                    
              switch($_GET['action']){
                case 'add':  
             
                    $query = "INSERT INTO product
                              (PRODUCT_ID, HSNC, CATEGORY_ID, PRODUCT_NAME, DESCRIPTION,STOCK_REQ)
                              VALUES (Null,'{$hsnc}',{$cat},'{$pname}','{$desc}','{$stock}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                    
                break;
              }
            ?>
              <script type="text/javascript">window.location = "purchase.php";</script>
          </div>



<?php
include './includes/footer.php';
?>