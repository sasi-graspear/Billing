 <?php
include './includes/sidebar.php';
include'./includes/connection.php';
include'./includes/reportstyle.php';
?>
 <div class="card shadow mb-4">
            
                <h1 class="text-center">PayIn Report</h1>
                <hr>
                
        
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                </div>
                <div class="row mt-12">
                    <div class="col-md-12">
                        <!-- Table -->
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
  border-radius: 10px 10px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
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
</style>
                            <table class="content-table" id="records" style="width:100%">
                                <thead>
                                    <tr>
									<th>ID</th>
                                        <th>customer Name</th>
										<th>Receipt No</th>
										<th>Receipt Date</th>
										<th>Payment Type</th>
										<th>Paid</th>
										<th>Total</th>
										<th>Description</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      
    </div>
<?php
include './includes/footer.php';
include './includes/reportjavascript.php';
?>
