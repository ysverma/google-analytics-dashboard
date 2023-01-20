<?php
session_start();
if (!isset($_SESSION["user"])) {

	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="./css/style.css" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- fonts owesome link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Bootstrap JS link-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<!-- Cart JS link-->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- Custom JS link-->
	<script src="js/DzoappsApiFetching.js"></script>
	<script src="js/DzoappsShowData.js"></script>



	<!-- Jquery css and js  link-->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>



	<style>
		.blink {
			animation: blinker 3s linear infinite;
			color: blue;
			font-family: sans-serif;
		}

		@keyframes blinker {
			50% {
				opacity: 0;
			}
		}

		.logo {
			margin-left: 1rem;
		}

		.logout {
			margin-right: 1rem;
			padding-right: 2rem;

		}

		.deviceCategory {
			text-align: center;
			padding-top: 2rem;
			padding-right: 2rem;

		}

		.traffic {
			text-align: center;
			padding-top: 2rem;
			padding-right: 2rem;
			padding-left: 2rem;
			padding-bottom: 2rem;

		}

		.border-left-primary,.border-left-success,.border-left-info,.border-left-warning {
			border-left: 0.25rem solid #f7b289;
			
		}

		.chart-pie,
		.chart-area {
			position: relative;
			/* height: 15rem; */
			width: 100%;
			display: flex;
			justify-content: center;
		}
		.domain{
			color: #2123EE;
		}
		.avgUserSession{
			background-color: #0d6efd ;
		}
		.pageViews{
			background-color: #6c757d ;
		}
		.bounceRate{
			background-color: #6f42c1;
		}
		.totalVisitor{
			background-color: #4e73df;
		}
		.tvtc{
			color: white;
		}
	</style>
	<title>Dashboard</title>
</head>

<body>

	<!-- Here a loader is created which loads till response comes -->
	<div class="spinner-border " role="status" id="loading">

	</div>

	<!-- Topbar Navbar -->
	<nav class="navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">
		<div class="topnav">

			<div>

				<div class="d-flex justify-content-between pb-4">
					<div class="logo mt-1 ">
						<img src="./assets/logo.png" alt="logo">
					</div>

					<?php 
						$useremail = $_SESSION["email"];
						$domainname = $_SESSION["domainname"];
					?>
					<marquee behavior="alternate">
						<h6 class="blink mt-3">Welcome <?php echo "$useremail"; ?></h6>
						
					</marquee>
					<div class="logout ">
					<h6 class="domain mt-3">Your Domain <?php echo "$domainname"; ?></h6>
						<a href="Logout.php" class="btn btn-info ">Logout</a>
					</div>
				</div>


			</div>
		</div>
	</nav>
	<!-- End of Topbar -->

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h3 class="mb-0">Analytics Dashboard</h3>
	</div>

	<!-- Web Traffic Card -->
	<div class="card shadow">
		<!-- Card Header -->
		<div class="card-header py-3 d-flex flex-row align-items-center">
			<h6 class="m-0 font-weight-bold text-primary">Web Traffic (30 Days)</h6>
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
					<h6 class="m-0 font-weight-bold text-primary"> Web trafic</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body">

					<div class="chart-area">
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
					<h6 class="m-0 font-weight-bold text-primary">Device category</h6>

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

						<table class="table table-hover table-responsive"  id="SearchConsoleTable">
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

						<div class="text-center">
							<i class='fas fas fa-arrow-left' style='font-size:30px' id="searchconsoleprevButton"></i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<i class='fas fas fa-arrow-right' style='font-size:30px' id="searchconsolenextButton"></i>
						</div>
					</div>
				</div>
			</div>

		</div>


		<!-- Top Location -->
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!--top location Card Header -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">

					<h6 class="m-0 font-weight-bold text-primary">Top Locations (30 Days)</h6>

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
						<!-- <button type="button" class="btn btn-secondary" id="topLocationprevButton">Previous</button>
						<button type="button" class="btn btn-secondary" id="topLocationnextButton">Next</button> -->

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
				<h6 class="m-0 font-weight-bold text-primary"> Top Pages (7 Days)</h6>

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

					<!-- <button type="button" class="btn btn-secondary" id="prevButtonTopPages">Previous</button>
					<button type="button" class="btn btn-secondary" id="nextButtonTopPages">Next</button> -->
				</div>

			</div>
		</div>
	</div>


	<script>
		//start search console 
		document.addEventListener("DOMContentLoaded", searchconsoleinit, false);

		let searchconsoleData, searchconsoletable, searchconsolesortCol;
		let searchconsolesortAsc = false;
		const searchconsolepageSize = 7;
		let searchconsolecurPage = 1;

		async function searchconsoleinit() {
			// Select the table (well, tbody)
			searchconsoletable = document.querySelector("#SearchConsoleTable tbody");
			// get the cats
			let searchconsoleresp = await fetch("./api/DzoappsSearchConsole.php");
			searchconsoleData = await searchconsoleresp.json();
			searchconsolerenderTable();

			document
				.querySelector("#searchconsolenextButton")
				.addEventListener("click", searchconsolenextPage, false);
			document
				.querySelector("#searchconsoleprevButton")
				.addEventListener("click", searchconsolepreviousPage, false);
		}

		function searchconsolerenderTable() {
			// create html
			let searchconsoleresult = "";
			searchconsoleData.filter((row, index) => {
				let start = (searchconsolecurPage - 1) * searchconsolepageSize;
				let end = searchconsolecurPage * searchconsolepageSize;
				if (index >= start && index < end) return true;
			}).forEach((c) => {
				searchconsoleresult += `<tr>
							<td>${c.query}</td>
							<td>${c.clicks}</td>
							<td>${c.impressions}</td>
							<td>${c.position.toFixed(2)}</td> 
     					</tr>`;
			});
			searchconsoletable.innerHTML = searchconsoleresult;

		}

		function searchconsolesort(e) {
			let thisSort = e.target.dataset.searchconsolesort;
			if (searchconsolesortCol === thisSort) searchconsolesortAsc = !searchconsolesortAsc;
			searchconsolesortCol = thisSort;
			console.log("sort dir is ", searchconsolesortAsc);
			searchconsoleData.searchconsolesort((a, b) => {
				if (a[searchconsolesortCol] < b[searchconsolesortCol]) return searchconsolesortAsc ? 1 : -1;
				if (a[searchconsolesortCol] > b[searchconsolesortCol]) return searchconsolesortAsc ? -1 : 1;
				return 0;
			});
			searchconsolerenderTable();
		}

		function searchconsolepreviousPage() {
			if (searchconsolecurPage > 1) searchconsolecurPage--;
			searchconsolerenderTable();
		}

		function searchconsolenextPage() {
			if (searchconsolecurPage * searchconsolepageSize < searchconsoleData.length) searchconsolecurPage++;
			searchconsolerenderTable();
		}

		/* *********************end search console  *************************************************/


		/* *********************start top location  *************************************************/
		document.addEventListener("DOMContentLoaded", topLocationinit, false);

		let topLocationData, topLocationtable, topLocationsortCol;
		let topLocationsortAsc = false;
		const topLocationpageSize = 5;
		let topLocationcurPage = 1;

		async function topLocationinit() {
			// Select the table (well, tbody)
			topLocationtable = document.querySelector("#topLocationTable tbody");
			// get the cats
			let topLocationresp = await fetch("./api/DzoappsRunReport.php");
			topLocationData = await topLocationresp.json();
			topLocationrenderTable();

			document
				.querySelector("#topLocationnextButton")
				.addEventListener("click", topLocationnextPage, false);
			document
				.querySelector("#topLocationprevButton")
				.addEventListener("click", topLocationpreviousPage, false);
		}

		function topLocationrenderTable() {
			// create html
			let topLocationresult = "";
			topLocationData.filter((row, index) => {
				let start = (topLocationcurPage - 1) * topLocationpageSize;
				let end = topLocationcurPage * topLocationpageSize;
				if (index >= start && index < end) return true;
			}).forEach((toploc) => {
				topLocationresult += `<tr>
					<td>${toploc.dimensionValues[0].value}</td>
        			<td>${toploc.metricValues[0].value}</td>    
				 </tr>`;
			});
			topLocationtable.innerHTML = topLocationresult;
		}

		function topLocationsort(e) {
			let thisSort = e.target.dataset.topLocationsort;
			if (topLocationsortCol === thisSort) topLocationsortAsc = !topLocationsortAsc;
			topLocationsortCol = thisSort;
			console.log("sort dir is ", topLocationsortAsc);
			topLocationData.topLocationsort((a, b) => {
				if (a[topLocationsortCol] < b[topLocationsortCol]) return topLocationsortAsc ? 1 : -1;
				if (a[topLocationsortCol] > b[topLocationsortCol]) return topLocationsortAsc ? -1 : 1;
				return 0;
			});
			topLocationrenderTable();
		}

		function topLocationpreviousPage() {
			if (topLocationcurPage > 1) topLocationcurPage--;
			topLocationrenderTable();
		}

		function topLocationnextPage() {
			if (topLocationcurPage * topLocationpageSize < topLocationData.length) topLocationcurPage++;
			topLocationrenderTable();
		}

		/* *********************End search console  *************************************************/
	
	</script>
<?php include("./Footor.php"); ?>
</body>

</html>