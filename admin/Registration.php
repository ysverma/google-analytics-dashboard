<?php
session_start();
if (!isset($_SESSION["user"])) {

	header("Location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Bootstrap CSS Link-->
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"-->
	<!--	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    
     <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css"> 
     <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
     
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Boxicons CSS Link -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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
			<span class="text">Dotzoo</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="Admin-Dashboard.php">
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
			<li class="active">
				<a href="Admin-Dashboard.php">
					<i class='bx bxs-file'></i>
					<span class="text">Registration</span>
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
							<a class="active" href="#">Registration</a>
						</li>
					</ul>
				</div>
				<!--<a href="#" class="btn-download">-->
				<!--	<i class='bx bxs-cloud-download' ></i>-->
				<!--	<span class="text">Download PDF</span>-->
				<!--</a>-->
			</div>

		<div class="container d-flex justify-content-center align-items-center wrapper fadeInDown">
        <!--<h5>Registration Form </h5>-->
        <div id="formContent">
             
                <form action="../../RegisterApi.php" method="post">
                 <?php if (isset($_GET['error'])) { ?>
        					<div class="alert alert-danger" role="alert">
        						<?= $_GET['error'] ?>
        					</div>
        		<?php } ?>
        		<?php if (isset($_GET['Message'])) { ?>
        			    <div class="alert alert-success" role="alert">
        					<?= $_GET['Message'] ?>
        				</div>
        		<?php } ?>
                    <div class="form-group">
                        
                        <input type="text" class="form-control" name="fullname" placeholder="Enter Your Full Name:">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder=" Enter Your Email:">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="domainname" placeholder="Enter Your Website Name:">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="role" placeholder="role:">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password:">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
                    </div>
                    <div class="form-btn">
                        <input type="submit" class="btn btn-primary" value="Register" name="submit">
                    </div>
                </form>
                 <div>
                    <p>Already Registered <a href="../../index.php">Login Here</a></p>
                </div>
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