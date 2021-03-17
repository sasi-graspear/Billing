<?php
include './includes/sidebar.php';
include'./includes/connection.php';
?>
<?php
  
$sql = "SELECT DISTINCT CUST_ID, full_name FROM customer order by full_name asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$cus = "<select class='form-control' name='customer' required>
        <option disabled selected hidden>Select customer</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $cus .= "<option value='".$row['CUST_ID']."'>".$row['full_name']."</option>";
  }

$cus .= "</select>";
?>
<!-- Begin Page Content -->
 <center><div class="card shadow mb-4" style="width:700px;">
<div class="card-header py-3" >
<h4 class="m-2 font-weight-bold text-primary">Payment In</h4> <br>

<form name="myform" class="form-group" action="savepayin.php?action=add" method="POST">
	<div class="row">
	<div class="col-md-6">
	<?php
     echo $cus; 
    ?>
	</div>
	<div class="col-md-6">
	<input type="text" class="form-control" placeholder="Receipt No" name="rno" required>
	</div>
	</div>
	<div class="row">	
	<div class="col-md-6">
	<br>
	<select class="form-control" name="paytype" required>
	<option value=""selected disabled>Payment Type</option>
	<option value="Cash">Cash</option>
	<option value="Chq">Cheque</option>
	</select>
	</div>
	<div class="col-md-6">
	<br>
	<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Receipt Date" name="rdate" required ></td>
	</div>
	</div><br>
	<div class="row" >
	<div class="col-md-4" >
	<input type="text" class="form-control" id="ex2" placeholder="Paid" name="paid" required>
	</div>
	<div class="col-md-4">
	<input type="text" class="form-control" placeholder="Discount" name="discount" >
	</div>
	<div class="col-md-4">
	<input type="text" class="form-control" placeholder="Total" name="total"required>
	</div>
	<br><br>
	<div class="col-md-12">
	<textarea rows="2" cols="50" texarea" class="form-control" placeholder="Description" name="description" ></textarea>
	</div></div>
<!--<table >
   <tr>
    <td>
      
      </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td ><input type="text" class="form-control" placeholder="Receipt No"></td>
  </tr>
  <tr>
    <td><br>
	<select class="form-control" name="Payment Type">
	<option value=""selected disabled>Payment Type</option>
	<option value="Cash">Cash</option>
	<option value="Chq">Cheque</option>
	</select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Receipt Date" name="rdate" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>
    <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" required></textarea>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="text" class="form-control" id="ex2" placeholder="Paid"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="text" class="form-control" placeholder="Discount"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="text" class="form-control" placeholder="Total"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>-->
	
 <div class="col-md-6" style="margin-top:50px;">
<button type="share" class="btn btn-primary" >SHARE
<button type="submit" class="btn btn-success" style="text-align: right;">SAVE</div>
</form>
</div>
</div></center>
<style>
 .btn-success {
    background: #28a745;
    border-color: #28a745;
    color: #ffffff;
    margin: 5px;
}
</style>

<?php
include './includes/footer.php';
?>