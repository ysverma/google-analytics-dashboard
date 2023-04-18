<!DOCTYPE html>
<html lang="en">

<head>
	
	
	

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!----- Custom Css--->
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css"> 
    <link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.min.css">
     
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

	<title>Admin Dashboard-Update</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Dotzoo</span>
		</a>
		<ul class="side-menu top">
			<li >
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
				<a href="UserList.php">
					<i class='bx bx-edit'></i>
					<span class="text">Update</span>
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
							<a class="active" href="#">Update</a>
						</li>
					</ul>
				</div>
			
			</div>

		<div class="container d-flex justify-content-center align-items-center wrapper fadeInDown">
       
        <div id="formContent">

            
<?php
    session_start();
    $conn = new mysqli("localhost","dotzoo_analytics_dashboard","@O7+qplhpM&9","dotzoo_analytics_dashboard") or die(mysqli_error());
    if(isset($_POST['done'])){
        $id = $_GET['id'];
        $username = $_POST['username'];
        $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null; // Hash the password if it's not null
        $q = "UPDATE users SET username='$username', password=".($password !== null ? "'$password'" : "NULL")." WHERE id=$id";
        $query = mysqli_query($conn,$q);
        if(!$query) {
            // Display the error message
            echo "Error updating record: " . mysqli_error($conn);
        } else {
            // Display the success message
            echo '<script>alert("Update Successful")</script>';
            echo "<script> window.location.href = 'UserList.php'; </script>";
            // header('location:UserList.php');
        }
    } else {
        // Retrieve the user's information from the database
        $id = $_GET['id'];
        $q = "SELECT * FROM users WHERE id=$id";
        $query = mysqli_query($conn,$q);
        if(!$query) {
            // Display the error message
            echo "Error fetching record: " . mysqli_error($conn);
        } else {
            $row = mysqli_fetch_assoc($query);
            $username = $row['username'];
            $password = $row['password'];
        }
    }
?>

                <form method="post">
        <br><br>
        <div class="card">
            <div class="card-header bg-dark">
                <h1 class="text-white text-center"> Update Operation </h1>
            </div><br>
            <label> Username: </label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"> <br>
            <label> Password: </label>
            <input type="text" name="password" class="form-control" value=""> <br>
            <button class="btn btn-primary" type="submit" name="done"> Update </button><br>
        </div>
    </form>
</div>

        
           
    </div>
    <?php include("../Footor.php"); ?>
    </main>
		<!-- MAIN -->
</section>
	<!-- CONTENT -->

	
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