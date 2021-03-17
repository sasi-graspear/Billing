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
              <h4 class="m-2 font-weight-bold text-primary">Customer's Detail</h4>
            </div>
            <a href="customer.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
                     <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Full Name<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $i; ?> <br>
                        </h5>
                      </div>

                    </div>

                    <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Address <br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $a; ?> <br>
                        </h5>
                      </div>
					   </div>
					  
                      <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Contact Name<br>
                        </h5>
                      </div>
					   
                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $b; ?> <br>
                        </h5>
                      </div>
					   </div>
					   
					  <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Contact No<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $c; ?> <br>
                        </h5>
                      </div>
					   </div>
					   
					  <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          Contact Email<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $d; ?> <br>
                        </h5>
                      </div>
					   </div>
					   
					  <div class="form-group row text-left">

                      <div class="col-sm-6 text-primary">
                        <h5>
                          GST No<br>
                        </h5>
                      </div>

                      <div class="col-sm-6">
                        <h5>
                          : <?php echo $e; ?> <br>
                        </h5>
                      </div>
                    </div>
            </div>
          </div>

<?php
include './includes/footer.php';
?>