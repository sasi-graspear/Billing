<?php
include './includes/sidebar.php';
include'./includes/connection.php';
?>
 <?php
  
  $query = 'SELECT * FROM customer WHERE CUST_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['CUST_ID'];
      $i= $row['full_name'];
      $a=$row['address'];
      $b=$row['contact_name'];
	  $c=$row['contact_no'];
	  $d=$row['contact_email'];
	  $e=$row['gstno'];
    }  
      $id = $_GET['id'];
?>
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Customer</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="customer.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
         
            <form role="form" method="post" action="cust_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Full Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Full Name" name="efull_name" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Address:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Address" name="eaddress" value="<?php echo $a; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact Name:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="contact name" name="econtact_name" value="<?php echo $b; ?>" required>
                </div>
              </div>
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact No:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Contact Number" name="econtact_no" value="<?php echo $c; ?>" required>
                </div>
              </div>
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact Email:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Contact Email" name="econtact_email" value="<?php echo $d; ?>" required>
                </div>
              </div>
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 GST No:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="GST No" name="egstno" value="<?php echo $e; ?>" required>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button> 
              </form>  
          </div>
  </div>

<?php
include './includes/footer.php';
?>