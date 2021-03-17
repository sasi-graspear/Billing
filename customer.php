<?php
include './includes/sidebar.php';
include'./includes/connection.php';
?>

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer&nbsp;<a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="ti-plus"></i></a></h4>
			  
            </div>
            
            <div class="card-body"><br>
			<div style="float: right;">Search: <input type="text" id="myInput" onkeyup="myFunction()" title="Type in a name" ></div><br>
              <div class="table-responsive">
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
  border-radius: 3px 3px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #343957;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}


.content-table th,
.content-table td {

  padding: 12px 15px;
 }
.content-table th{
	color: #ffffff;
	font-size: 1.2em;
}
.content-table tbody tr {
  border-bottom: 0px solid #dddddd;
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
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}
.content-table th {
  cursor: pointer;
}

.content-table .th-sort-asc::after {
  content: "\25b4";
}

.content-table .th-sort-desc::after {
  content: "\25be";
}

.content-table .th-sort-asc::after,
.content-table .th-sort-desc::after {
  margin-left: 5px;
}

.content-table .th-sort-asc,
.content-table .th-sort-desc {
  background: rgba(0, 0, 0, 0.1);
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color:  #343957!important;
    border-bottom: px solid rgba(0,0,0,.125);
    border-radius:3px;
}
.text-primary {
    color: #ffffff!important;
}
#myInput{
  color: red;
  padding: 3px 0px;
  border-radius:5px;
  border:1px solid lightgray;
}
tbody tr td {
    font-family: 'Roboto', sans-serif;
    color: #000033;
    font-size: 14px;
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
.btn{
  background-color: #563d7c;
  border:1px solid #563d7c;
  color: #ffe484;
}
</style>
                <table class="content-table" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Contact Name</th> 
						 <th>Contact No</th>
						  <th>Contact Email</th>
						   <th>GST No</th>  
						  <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = 'SELECT * FROM customer';
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. $row['full_name'].'</td>';
                      echo '<td>'. $row['address'].'</td>';
					  echo '<td>'. $row['contact_name'].'</td>';
                      echo '<td>'. $row['contact_no'].'</td>';
					  echo '<td>'. $row['contact_email'].'</td>';
					  echo '<td>'. $row['gstno'].'</td>';
                      echo '<td align="right"><a type="button" class="btn btn-info btn-sm" href="cust_searchfrm.php?action=edit & id='.$row['CUST_ID'] . '"><i class="fa fa-search" aria-hidden="true"></i></a>
<a type="button" class="btn btn-warning btn-mini btn-sm"  href="cust_edit.php?action=edit & id='.$row['CUST_ID']. '">
<i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a><a type="button" class="btn btn-danger btn-sm" style="margin:4px;"href="cust_delete.php?action=edit & id='.$row['CUST_ID'] . '"><i class="fa fa-trash" aria-hidden="true"></i></a>
<a type="button" class="btn btn-info btn-sm"  href="cust_addb.php?action=add & id='.$row['CUST_ID']. '"><i class="fa fa-plus-circle " aria-hidden="true"></i> Add branch</a></td>';
                      echo '</tr> ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<!-- Customer Modal-->
  <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cust_transac.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="Full Name" name="full_name" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Address" name="address" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Contact Name " name="contact_name" required>
            </div>
			<div class="form-group">
              <input class="form-control" placeholder="Contact No " name="contact_no" required>
            </div>
			<div class="form-group">
              <input class="form-control" placeholder="Contact Email " name="contact_email" required>
            </div>
			<div class="form-group">
              <input class="form-control" placeholder="GST No" name="gstno" required>
            </div>
			<hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
/**
 * Sorts a HTML table.
 * 
 * @param {HTMLTableElement} table The table to sort
 * @param {number} column The index of the column to sort
 * @param {boolean} asc Determines if the sorting will be in ascending
 */
function sortTableByColumn(table, column, asc = true) {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });

    // Remove all existing TRs from the table
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how the column is currently sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".content-table th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains("th-sort-asc");

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
    });
});

</script>
<script>
     $(document).ready(function(){
	   $("#dataTable").dataTable();
	 });
   
   </script>
<?php
include './includes/footer.php';
?>
