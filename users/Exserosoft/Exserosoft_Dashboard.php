<?php
session_start();
if (!isset($_SESSION["user"])) {

	header("Location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

		<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css"> 
     <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- fonts owesome link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Bootstrap JS link-->
	<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>-->

	<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->
    
     <script src="../../css/bootstrap/js/bootstrap.js"></script>
    <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
    
	<!-- Cart JS link-->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom JS link-->
	<script src="../../js/Exserosoft/Exserosoft_Api_Fetching.js"></script>
	<script src="../../js/Exserosoft/Exserosoft_Show_Data.js"></script>
	
	<!--jQuery library -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!--DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

	<!--DataTables JavaScript -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

	<link rel="stylesheet" href="../../css/dashboard.css" />

	<title>Exserosoft-Dashboard</title>
</head>

<body>

	<!-- Here a loader is created which loads till response comes -->
	<div class="spinner-border " role="status" id="loading"> </div>

	<!-- Topbar Navbar -->
	<nav class="navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">
		    <div>
			    <div class="d-flex justify-content-between pb-4">
					<div class="logo mt-1">
						<img src="../../assets/logo.png" alt="logo">
					</div>

					<?php
					$user_email = $_SESSION["email"];
					$user_Name = $_SESSION["username"];
				// 	$domain_name = $_SESSION["domainname"];
					?>
					<marquee behavior="alternate">
						<h6 class="blink mt-3">Welcome <?php echo "$user_Name"; ?></br></br> Email:<?php echo "$user_email"; ?></h6>
					</marquee>
					<div class="logout ">
						<h6 class="domain mt-3">Your Domain exserosoft.com</h6>
						<a href="../../Logout.php" class="btn btn-info ">Logout</a>
					</div>
				</div>
			
		</div>
	</nav>
	<!-- End of Topbar -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h3 class="mb-0">Analytics Dashboard</h3
		
		<div class="d-sm-flex">
			<button class="printreport" onclick="window.print()">
				<span class="text">Print Report</span>
				<i class="fa fa-print" aria-hidden="true"></i>
			</button>

			<!-- Add select options for date range -->
			<form class="date" method="POST">
				<label for="date_range">Date Range:</label>
				<div>
					<select id="date_range" name="date_range">
                        <option value="7"<?php if(isset($_POST['date_range']) && $_POST['date_range'] == '7') echo ' selected'; ?>>Last 7 Days</option> 
                        <option value="28"<?php if(isset($_POST['date_range']) && $_POST['date_range'] == '28') echo ' selected'; ?>>Last 28 Days</option>
                        <option value="90"<?php if(isset($_POST['date_range']) && $_POST['date_range'] == '90') echo ' selected'; ?>>Last 3 Months</option>
                        <option value="180"<?php if(isset($_POST['date_range']) && $_POST['date_range'] == '180') echo ' selected'; ?>>Last 6 Months</option>
                        <option value="custom" <?php if(isset($_POST['date_range']) && $_POST['date_range'] == 'custom') echo ' selected'; ?>>Custom: <?php if(isset($_POST['start_date'])) echo $_POST['start_date']; ?> - <?php if(isset($_POST['end_date'])) echo $_POST['end_date']; ?></option>
                    </select>
					<div id="custom_dates" style="display: none;">
						<label for="start_date">Start Date:</label></br>
						<input type="date" id="start_date" name="start_date"></br>
						<label for="end_date">End Date:</label></br>
						<input type="date" id="end_date" name="end_date">
					</div>
					<button type="submit" name="submit_date">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</div>

			</form>

			<script>
				document.getElementById("date_range").addEventListener("change", function() {
					var custom_dates_div = document.getElementById("custom_dates");
					if (this.value === "custom") {
						custom_dates_div.style.display = "block";
					} else {
						custom_dates_div.style.display = "none";
					}
				});
				
			</script>

		<?php
            if (isset($_POST["submit_date"])) {
            	$date_range = $_POST["date_range"] ?? '';
            	$start_date = '';
            	$end_date = '';
            
            	require_once __DIR__ . "../../../api/Database/DbConfig.php";
            
            	// Validate date range and set start and end dates accordingly
            	if (!empty($date_range)) {
            		if ($date_range === "custom") {
            			$start_date = $_POST["start_date"] ?? '';
            			$end_date = $_POST["end_date"] ?? '';
            			if (empty($start_date) || empty($end_date)) {
            				echo "<script>alert('Please select both start and end dates for custom date range');</script>";
            				exit();
            			}
            		} else if ($date_range === "7") { 
            			// Calculate start and end dates for last 7 days
            			$end_date = date("Y-m-d"); // Current date
            			$start_date = date("Y-m-d", strtotime("-7 days", strtotime($end_date)));
            		} else {
            			// Calculate start and end dates based on selected range
            			$end_date = date("Y-m-d"); // Current date
            			$start_date = date("Y-m-d", strtotime("-$date_range days", strtotime($end_date)));
            		}
            
            		// Update date range in database
            		$sql = "UPDATE date_range SET start_date='$start_date', end_date='$end_date' WHERE id=1";
            		if (mysqli_query($conn, $sql)) {
            			// echo "Dates updated successfully";
            		} else {
            			echo "Error: " . mysqli_error($conn);
            		}
            	} else {
            		echo "Please select a date range";
            	}
            
            	// Close database connection
            	mysqli_close($conn);
            }
        ?>

		</div>
	</div>

	<!-- Web Traffic Card -->
	<div class="card shadow">
		<!-- Card Header -->
		<div class="card-header py-3 d-flex flex-row align-items-center">
			<h6 class="m-0 font-weight-bold text-primary">Web Traffic </h6>
		</div>
		<div class="card_body">
			<!-- card Row -->
			<div class="row ">
				<!-- Total Visitors Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2 totalVisitor ">
						<div class="card-body totalVisitor">
							<div class="row no-gutters align-items-center totalVisitor">
								<div class="col mr-2 totalVisitor">
									<div class="text-xs font-weight-bold text-uppercase mb-1 text-center totalVisitor text-white">
										Total Visitors</div>
									<div class="h5 mb-0 font-weight-bold  text-center totalVisitor text-white" id=totalVisitor></div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!--Page Views Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2 pageViews">
						<div class="card-body pageViews">
							<div class="row no-gutters align-items-center pageViews">
								<div class="col mr-2 pageViews">
									<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">
										Page Views</div>
									<div class="h5 mb-0 font-weight-bold text-center text-white pageViews" id="pageViews"></div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!--Avg. Session (Min) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2 avgUserSession">
						<div class="card-body avgUserSession">
							<div class="row no-gutters align-items-center avgUserSession">
								<div class="col mr-2 avgUserSession">
									<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center avgUserSession">Avg. Session (Min)
									</div>
									<div class="h5 mb-0 font-weight-bold text-center text-white avgUserSession" id="avgUserSession"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- bounceRate Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2 bounceRate">
						<div class="card-body bounceRate">
							<div class="row no-gutters align-items-center bounceRate">
								<div class="col mr-2 bounceRate">
									<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center bounceRate">Bounce Rate (%)</div>
									<div class="h5 mb-0 font-weight-bold text-white text-center bounceRate" id="bounceRate"> </div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- End Card Row -->
		</div>
	</div>

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary"> Traffic Sources</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body">

					<div class="chart-area pt-4 pb-2">
						<canvas id="myChart"></canvas>
					</div>

				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!-- Card Header -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Device Category</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-pie pt-4 pb-2">
						<canvas id="pychart"></canvas>
					</div>


				</div>
			</div>
		</div>
	</div>

	<!--End Chart Content Row -->

	<!--start top pages and Location Content Row -->
	<div class="row">
		<!-- Search console data  -->

		<!-- Search console keywords -->
		<div class="col-xl-8 col-lg-5">
			<div class="card shadow mb-4">
				<!-- Card Header -->
				<div class="card shadow">
					<!-- Card Header -->
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Google Search KeyWords</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<!-- <div> -->

						<table class="table table-hover table-responsive" id="SearchConsoleTable">
							<thead>
								<tr>
									<th scope="col">Keywords</th>
									<th scope="col">Clicks</th>
									<th scope="col">Impressions</th>
									<th scope="col">Position</th>
								</tr>
							</thead>
							<tbody id="searchconsole">

							</tbody>

						</table>

					</div>
				</div>
			</div>

		</div>


		<!-- Top Location -->
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!--top location Card Header -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">

					<h6 class="m-0 font-weight-bold text-primary">Top Locations</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body">
					<!--  topLocation data  -->
					<div class="topLocation table-responsive">

						<table class="table table-hover " id="topLocationTable">
							<thead>
								<tr>
									<th scope="col">Country</th>
									<th scope="col">Total User</th>
								</tr>
							</thead>
							<tbody id="locationData">

							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- Top Pages -->
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"> Top Pages</h6>

			</div>
			<!-- Card Body -->
			<div class="card-body">

				<div class="top-pages table-responsive">
					<table class="table table-hover table-responsive " id="topPagesTable">
						<thead>
							<tr>
								<th scope="col">Page</th>
								<th scope="col">Views</th>
								<th scope="col">Page URL</th>
							</tr>

						</thead>
						<tbody id="topPages">

						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>


    <script>
    $(document).ready(function () {
      const searchconsolepageSize = 5;
      let searchconsolecurPage = 1;
      let searchconsolesortAsc = false;
      let searchconsolesortCol = null;
    
      // Fetch data from the API
      $.ajax({
        url: "../../api/Exserosoft/Exserosoft_Search_Console.php",
        type: "GET",
        dataType: "json",
        success: function (data) {
          // Filter out duplicates using a Set
          const searchconsoleSet = new Set();
          const searchconsoleFilteredData = data.filter(function (row) {
            if (searchconsoleSet.has(row.query)) {
              return false;
            } else {
              searchconsoleSet.add(row.query);
              return true;
            }
          });
    
          // Create DataTable instance
          const table = $("#SearchConsoleTable").DataTable({
            data: searchconsoleFilteredData,
            columns: [
              { title: "Query", data: "query" },
              { title: "Clicks", data: "clicks" },
              { title: "Impressions", data: "impressions" },
              { title: "Position", data: "position", render: $.fn.dataTable.render.number(",", ".", 0, "") },
            ],
            order: [],
            pageLength: searchconsolepageSize,
            lengthMenu: [5, 7, 10, 20, 50],
            searching: false, // Remove search button
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            language: {
              lengthMenu: "Display _MENU_ records per page",
              zeroRecords: "No records found",
              info: "Showing _START_ to _END_ of _TOTAL_ records",
              infoEmpty: "Showing 0 to 0 of 0 records",
              infoFiltered: "(filtered from _MAX_ total records)",
              paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous",
              },
            },
          });
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText);
        },
      });
    });
    
    </script>


	<!--//* *********************end search console  *************************************************/-->

	<?php include("../../Footor.php"); ?>
</body>

</html>