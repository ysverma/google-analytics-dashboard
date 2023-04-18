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

	<title>Admin Dashboard-Userlist</title>
</head>

<body>
<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="Admin-Dashboard.php">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li class="active">
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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">User List</a>
						</li>
					</ul>
				</div>
				<!--<a href="#" class="btn-download">-->
				<!--	<i class='bx bxs-cloud-download' ></i>-->
				<!--	<span class="text">Download PDF</span>-->
				<!--</a>-->
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All User List</h3>
						<!--<i class='bx bx-search' ></i>-->
						<!--<i class='bx bx-filter' ></i>-->
					</div>
					<table  id="tabledata" class="table table-striped table-hover table-bordered">
						<thead>
							<tr class="bg-dark text-white text-center">
								<th> Id </th>
								<th> User Name </th>
								<th> Email </th>
								<th> Domain </th>
								<!--<th> Password </th>-->
								<th> Delete </th>
                                <th> Update </th>
                               
							</tr>
						</thead>
						<tbody>
							 <?php

                               
                                 $conn = new mysqli("localhost","dotzoo_analytics_dashboard","@O7+qplhpM&9","dotzoo_analytics_dashboard") or die(mysqli_error());
                                 $q = "SELECT * FROM users ";
                                
                                 $query = mysqli_query($conn,$q);
                                
                                 while($res = mysqli_fetch_array($query)){
                                 ?>
                                 <tr class="text-center">
                                 <td class="user_id"> <?php echo $res['id'];  ?> </td>
                                 <td> <?php echo $res['username'];  ?> </td>
                                 <td> <?php echo $res['email'];  ?> </td>
                                 <td> <?php echo $res['domain'];  ?> </td>
                                  <!--<td> <?php echo $res['password'];  ?> </td>-->
                                 
                                 <td> <button onclick="showConfirmation(<?php echo $res['id']; ?>)"  class="btn-danger btn text-white">Delete</button></td>
                                 <td> <button class="btn-primary btn"> <a href="Update.php?id=<?php echo $res['id']; ?>" class="text-white"> Update </a> </button> </td>
                                
                                 </tr>
                                
                                 <?php 
                                 }
                             ?>
						</tbody>
					</table>
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
    
    <script>
function showConfirmation(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = "Delete.php?id=" + id;
    }
}
</script>

</body>

</html>