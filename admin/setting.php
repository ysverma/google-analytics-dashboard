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

	<title>Admin Dashboard-Setting</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
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
		</ul>
		<ul class="side-menu">
			<li class="active">
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
							<a class="active" href="#">Setting</a>
						</li>
					</ul>
				</div>
				<!--<a href="#" class="btn-download">-->
				<!--	<i class='bx bxs-cloud-download' ></i>-->
				<!--	<span class="text">Download PDF</span>-->
				<!--</a>-->
			</div>

		<div class="container justify-content-center align-items-center wrapper fadeInDown">
        <!--<h5>Registration Form </h5>-->
        <div id="formContent">

            <?php
            $conn = new mysqli("localhost", "dotzoo_analytics_dashboard", "@O7+qplhpM&9", "dotzoo_analytics_dashboard");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $query = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $query->bind_param("i", $_SESSION['userid']);
            $query->execute();
            $result = $query->get_result();
            $fetch = $result->fetch_assoc();
            
            $errors = array();
            
            if (isset($_POST['submit'])) {
                // Get the form data
                $username = htmlspecialchars($_POST['fullname'], ENT_QUOTES);
                $new_password = $_POST['password'];
                $current_password = $_POST['current_password'];
                $id = $_SESSION['userid'];
            
                // Verify the user's current password hash
                $stored_password = $fetch['password'];
                if (password_verify($current_password, $stored_password)) {
                    // Hash the new password
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
                    // Check if the password needs to be rehashed
                    if (password_needs_rehash($stored_password, PASSWORD_DEFAULT)) {
                        $query = $conn->prepare("UPDATE users SET username = ?, password = ?, updated_at = NOW() WHERE id = ?");
                        $query->bind_param("ssi", $username, $hashed_password, $id);
                    } else {
                        $query = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
                        $query->bind_param("ssi", $username, $hashed_password, $id);
                    }
                    $query->execute();
            
                    // Display the alert box 
                    echo '<script>alert("Update Successful")</script>';
                    // echo "<script> window.location.href = 'UserList.php'; </script>";
                } else {
                
                    // If the current password is incorrect, add an error message to the errors array
                    $errors[] = "Incorrect password";
                }
            }
            ?>

            <div class="container">
                <div class="row d-flex justify-content-center mt-5 mb-5">
                        <div class="text-left">
                                <h5>Edit Profile </h5>
                         </div>
                    <div class="col-md-6">
                        
                        <div class="card p-4">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                           
                                <div class="mt-2">
                                    <div class="form">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email" disabled value="<?php echo  $fetch['email'];?>">
                                    </div>
                                </div>
                                  <div class="mt-2">
                                    <div class="form">
                                        <label for="email">Name:</label>
                                         <input type="text" class="form-control" name="fullname" value="<?php echo $fetch['username']; ?>" required>
                                    </div>
                                </div>
                                
                                  <div class="mt-2">
                                    <div class="form">
                                        <label for="email">Current Password:</label>
                                        <input type="password" class="form-control" name="current_password" required>
                                        <?php if (in_array("Incorrect password", $errors)): ?>
                                            <p class="text-danger">Incorrect password. Please try again.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                 <div class="mt-2">
                                    <div class="form">
                                        <label for="password">New Password:</label>
                                        <input type="password" class="form-control" name="password" required>
                                        <?php if (isset($errors) && in_array("Password is too short", $errors)): ?>
                                            <p class="text-danger">Password is too short. Please enter at least 8 characters.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <button type="submit" name="submit" class="button btn btn-primary w-100 d-flex justify-content-center align-items-center">
                                        <span>Update</span></button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
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