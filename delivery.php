<?php
include './includes/sidebar.php';
include'./includes/connection.php';
?>
         <?php
  
$sql = "SELECT * FROM state order by state_name asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='state' required>
        <option disabled selected hidden>Select state</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['state_id']."'>".$row['state_name']."</option>";
  }

$aaa .= "</select>";

$sql1 = "SELECT DISTINCT CUST_ID, full_name FROM customer order by full_name asc";
$result1 = mysqli_query($db, $sql1) or die ("Bad SQL: $sql1");

$cus = "<select class='form-control' name='customer' required>
        <option disabled selected hidden>Select customer</option>";
  while ($row = mysqli_fetch_assoc($result1)) {
    $cus .= "<option value='".$row['CUST_ID']."'>".$row['full_name']."</option>";
  }

$cus .= "</select>";

$sql3 = "SELECT * FROM gst";
$result3 = mysqli_query($db, $sql3) or die ("Bad SQL: $sql3");

$gst = "<select class='form-control' name='gst[]' required>
        <option disabled selected hidden>Select GST</option>";
  while ($row = mysqli_fetch_assoc($result3)) {
    $gst .= "<option value='".$row['gst_id']."'>".$row['gst_name']."</option>";
  }

$gst .= "</select>";

$sql4 = "SELECT * FROM product";
$result4 = mysqli_query($db, $sql4) or die ("Bad SQL: $sql4");

$pro = "<select class='form-control' name='product[]' required>
        <option disabled selected hidden>Product Name</option>";
  while ($row = mysqli_fetch_assoc($result4)) {
    $pro .= "<option value='".$row['PRODUCT_ID']."'>".$row['PRODUCT_NAME']."</option>";
  }

$pro .= "</select>";

$sql5 = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result5 = mysqli_query($db, $sql5) or die ("Bad SQL: $sql5");

$cat = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result5)) {
    $cat .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$cat .= "</select>";


?>
<div class="card shadow mb-4">
<div class="card-header py-3">
<h4 class="m-2 font-weight-bold text-primary">Delivery Challan</h4> <br>
<form name="myform" class="form-group" action="savedelivery.php?action=add" method="POST">
	<div class="row">
	<div class="col-md-3">
	<?php
     echo $cus; 
    ?>
	</div>
	</div>
	<div class="row">
	<div class="col-md-3">
	<label for ="Challanno">Challan No</label>
	<input type="text" class="form-control" placeholder="Challan No" name="cno" required>
	</div>
	<div class="col-md-3">
	<label for ="idate">Challan Date</label>
	<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Challan Date" name="cdate" required >
	</div>
	<div class="col-md-3">
	<label for ="ddate">Due Date</label>
	<input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Due Date" name="ddate" >
	</div>
	<div class="col-md-3">
	<label for="State">State Of Supply</label>
	<?php
     echo $aaa; 
    ?>
	</div>
	<div class="col-md-3">
	<label for="Pterms">Payment Type</label>
	<select class="form-control" name="paytype" required>
	<option value=""selected disabled>Select</option>
	<option value="Cash">Cash</option>
	<option value="Chq">Cheque</option>
	</select>
	</div>
	</div>
		
  <div class="row clearfix" style="margin-top:30px">
    <div class="col-md-12">
       <Style>
* {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 0px 0px 0 0;
  overflow: hidden;
  box-shadow: 0 0 0px rgba(0, 0, 0, 0.0);
}

.content-table thead tr {
  background-color: #343957;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th{
	color: #ffffff;
	font-size: 1.2em;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
 }

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color:  #e6e6ff!important;
    border-bottom: 1px solid rgba(0,0,0,.125);
    border-radius:3px;
}
.text-primary {
    color: #000033!important;
}
#myInput{
  color: red;
  padding: 3px 0px;
  border-radius:5px;
  border:1px solid lightgray;
}
.card{
  background-color: #e6e6ff!important;
  margin:0px;
  padding: 10px;
}
.container-fluid {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 0px;
    padding-left: 0px;
}
.header {
    background:  #e6e6ff!important;
    z-index: 990;
    margin-left: 250px;
    box-shadow: 0 0px 0px rgb(0 0 0 / 0%);
    transition: margin-left 300ms ease-in-out 0s;
}
.btn-primary {
    background: #5873fe;
    border-color: #5873fe;
    color: #ffffff;
    margin: 0px 5px;
}
</style>
     <table class="content-table" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center" width="20"> # </th>
            <th class="text-center"width="200" > Product</th>
			<th class="text-center"width="160" > Description</th>
			<th class="text-center" width="100"> Qty </th>
			<th class="text-center"width="130"> Price </th>
			<th class="text-center" width="120"> GST </th>
            <th class="text-center" width="120"> GST Amount </th>
            <th class="text-center"width="130"> Total </th>
          </tr>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td style="text-align:center">1</td>
            <td "text-align:center"><input type="text" name='product[]' placeholder='Enter Product' class="form-control product" style="text-align: center;" required/></td>
			<td "text-align:center"><input type="text" name='desc[]' placeholder='Description' class="form-control description" style="text-align: center;" required/></td>
			<td><input type="number" name='qty[]' placeholder='Qty' class="form-control qty" step="0" min="0" style="text-align: center;" required/></td>
			<td "text-align:center"><input type="number" name='price[]' placeholder='Unit Price' class="form-control price" step="0.00" min="0" style="text-align: center;"required/></td>
			<td "text-align:center"><select class="form-control gst" name="gst[]" style="text-align-last: center;" required/>
			<option  value="" selected disabled>gst %</option>
			<option  value="18">18</option>
			<option  value="28">28</option>
			<option  value="12">12</option>
			</select></td>
            <td "text-align:center"><input type="number" name='gstamount[]'  class="form-control gstamount" placeholder='0.00'style="text-align: center;" readonly/></td>
            <td "text-align:center"><input type="number" name='total[]' placeholder='0.00' class="form-control total" style="text-align: center;" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
	  
</div>
  </div>
  <div class="row clearfix" style="text-align:center;">
    <div class="col-md-12">
     <!-- <button id="add_row" class="btn btn-default pull-left">Add Row</button>-->
	  <a href="#" id="add_row" class="btn btn-info" role="button">Add Row</a>
	  <a href="#" id='delete_row' class="btn btn-danger" role="button">Delete Row</a>
     <!-- <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>-->
    </div>
  </div>
 <div class="row clearfix" style="margin-top:50px;">
    <div class="pull-right col-md-6">
      <table class="table table-bordered table-hover" id="tab_logic_total" >
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
         
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='tamount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
		  <tr>
            <th class="text-center">Discount</th>
            <td class="text-center"><input type="number" name='discount' placeholder='0.00' class="form-control" ></td>
          </tr>
        </tbody>
 </table>
 </div>
 </div> 
	  <div class="col-md-6" style="text-align: right;">
<button type="share" class="btn btn-primary" >SHARE
<button type="submit" class="btn btn-success" style="text-align: right;" id="save" >SAVE</div>

</form>

    
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = parseInt($(this).find('.qty').val());
			var price = parseInt($(this).find('.price').val());
			var gst = parseInt($(this).find('.gst').val());
			$(this).find('.gstamount').val((qty*price*gst)/100);
			var tgstamount = parseInt($(this).find('.gstamount').val());
			$(this).find('.total').val((qty*price)+tgstamount);			
			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
    gstamount=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('.gstamount').each(function() {
        gstamount += parseInt($(this).val());
    });
	
	$('#sub_total').val(total.toFixed(2));
	$('#tax_amount').val(gstamount.toFixed(2));
	$('#total_amount').val(total.toFixed(2));

	
	
}

</script>
 
</div>
</div>
<?php
include './includes/footer.php';
?>