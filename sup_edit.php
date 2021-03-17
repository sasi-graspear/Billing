<?php
include'./includes/connection.php';
include'./includes/sidebar.php';
  
?>
  <?php
 
  $query = 'SELECT * FROM suppliers WHERE supplier_id ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz = $row['supplier_id'];
       $a= $row['supplier_name'];
	   $b=$row['contact_person'];
	   $c=$row['supplier_address'];
	   $d=$row['supplier_contact'];                          
	   $e=$row['contact_mail'];
	   $f=$row['gst_no'];
    }
      $id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Supplier</h4>
            </div>
            <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="supplier.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      
            <form role="form" method="post" action="sup_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Supplier Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Supplier Name" name="esname" value="<?php echo $a; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact Person:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Conact Name" name="ecperson" value="<?php echo $b; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Address:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Address" name="eaddress" value="<?php echo $c; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact No:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Contact Number" name="econtactno" value="<?php echo $d; ?>" required>
                </div>
              </div>
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact Email:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Contact Email" name="econtactmail" value="<?php echo $e; ?>" required>
                </div>
              </div>
			  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 GST No:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="GST Number" name="egstno" value="<?php echo $f; ?>" required>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'./includes/footer.php';
?>