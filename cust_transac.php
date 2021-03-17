<?php
include './includes/sidebar.php';
include'./includes/connection.php';
?>
 <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $a = $_POST['full_name'];
              $b = $_POST['address'];
              $c = $_POST['contact_name'];
              $d = $_POST['contact_no'];
			  $e = $_POST['contact_email'];
			  $f = $_POST['gstno'];
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO customer
                    (CUST_ID, full_name, address, contact_name, contact_no, contact_email, gstno)
                    VALUES (Null,'{$a}','{$b}','{$c}','{$d}','{$e}','{$f}')";
                    mysqli_query($db,$query)or die ('Error in updating Database');
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "customer.php";
              </script>
          </div>
<?php
include './includes/footer.php';
?>