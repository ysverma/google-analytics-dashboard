<?php
session_start();
if (!isset($_SESSION["user"])) {

	header("Location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>


	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!--Side icon link -->
   	<link rel="icon" type="image/x-icon" href="/assets/logo.png">
	
	<!-- Boxicons CSS Link -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS Link-->
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"-->
	<!--	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
	
	 <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css"> 
     <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
	<!-- Fonts owesome Link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
		integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!--DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

	<!--Custom CSS Link-->
	<link rel="stylesheet" href="style.css" />
    
	<title>Admin Dashboard</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="UserList.php">
					<i class='bx bxs-group'></i>
					<span class="text">User</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="setting.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="../Logout.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">
				<img src="../../assets/logo.png" alt="logo">
				
			</a>

			<form action="#">
				<!--<div class="form-input">-->
				<!--	<input type="search" placeholder="Search...">-->
				<!--	<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>-->
				<!--</div>-->
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<!--<label for="switch-mode" class="switch-mode"></label>-->

			<a href="../Logout.php" class="profile">
				<img src="image/people.png">
				<span class="logout-text">Logout</span>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!--<a href="#" class="btn-download">-->
				<!--	<i class='bx bxs-cloud-download' ></i>-->
				<!--	<span class="text">Download PDF</span>-->
				<!--</a>-->
			</div>

			<ul class="box-info">
                     <?php 
                           $conn = new mysqli("localhost","dotzoo_analytics_dashboard","@O7+qplhpM&9","dotzoo_analytics_dashboard") or die(mysqli_error());
                           $qusers = $conn->query("SELECT COUNT(id) AS total FROM `users`") or die(mysqli_error());
                           $fusers = $qusers->fetch_array();
                        //  print_r($fusers);
                
                         ?>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3><?php echo $fusers['total']-1;?></h3>
						 
						<p>Total Users</p>
						
					</span>
				</li>
				<li>
					<i class='bx bxs-file'></i>
					<a href="Registration.php" class="">Register New User</a>
				</li>

			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Users</h3>
						<!--<i class='bx bx-search'></i>-->
						<!--<i class='bx bx-filter'></i>-->
					</div>
					<!-- Web Traffic Card -->
					<div class="card shadow">
						<!-- Card Header -->
						<div class="card-header py-3 d-flex flex-row align-items-center">
							<h6 class="m-0 font-weight-bold text-primary">Users</h6>
						</div>
						<div class="card_body">
							<!-- card Row -->
							<div class="row ">
								<!--Dzoapps.com  -->
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
												
													<div class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/dzoapps/DzoappsDashboard.php" class=""
															target="_blank">DzoApps</a>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>

								<!--Dotzoo.com  -->
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/dotzoo/Dotzoo-Dashboard.php" class=""
															target="_blank">Dotzoo.com</a>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>

								<!--Dotzoo.net  -->
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/dotzooDotNet/DotzooDotNetDashboard.php"
															class="" target="_blank">Dotzoo.net</a>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
                                
                                <!--IERM  -->
                                <div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/IERM/IERM_Dashboard.php" class=""
															target="_blank">IeRM</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                                
								<!--Pacific Highway Dental  -->
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/PHD/PHD_Dashboard.php" class=""
															target="_blank">Pacific Highway Dental</a>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>

								<!--Edmonds Bay Denatl  -->
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/edmonds_bay_dental/EbdDashboard.php"
															class="" target="_blank">Edmonds Bay Dental</a>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<!--PPE Mart -->
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/PPE-Mart/PPE-Mart_Dashboard.php" class=""
															target="_blank">PPE-Mart</a>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>

								<!--Exserososft -->
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/Exserosoft/Exserosoft_Dashboard.php"
															class="" target="_blank">Exserosoft</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<!--<div class="text-xs font-weight-bold text-white text-uppercase mb-1 text-center pageViews text-info">-->
													<!--	Page Views</div>-->
													<div
														class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/Cascade/Cascade_Dashboard.php" class=""
															target="_blank">Cascade Thermal</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2 pageViews">
										<div class="card-body pageViews">
											<div class="row no-gutters align-items-center pageViews">
												<div class="col mr-2 pageViews">
													<div class="h5 mb-0 font-weight-bold text-center text-white pageViews">
														<a href="../../users/FoldnGoBike/FoldnGoBike_Dashboard.php"
															class="" target="_blank">FoldnGoBikes</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- END FOLDING -->
							</div><!-- End Card Row -->
						</div><!--End Card Body -->
					</div><!-- End Card-->

				</div>
            </div>

            <?php include("../Footor.php"); ?>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->




	<!-- Bootstrap JS link-->
	<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"-->
	<!--	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"-->
	<!--	crossorigin="anonymous"></script>-->
		
	<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"-->
	<!--	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"-->
	<!--	crossorigin="anonymous"></script>-->

     <script src="../../css/bootstrap/js/bootstrap.js"></script>
    <script src="../../css/bootstrap/js/bootstrap.min.js"></script>
	<!-- Chart JS link-->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!--jQuery library -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!--DataTables JavaScript -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

	<!--Custom Script-->
	<script src="script.js"></script>

	


</body>

</html>
