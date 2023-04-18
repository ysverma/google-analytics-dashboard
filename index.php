<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Login Form</title>
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">-->
     <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.css"> 
     <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>
<?php  include("./Header_login.php");?>
   
    <div class="container d-flex justify-content-center align-items-center wrapper fadeInDown">
        <div id="formContent">
            <form class="d-flex border shadow p-3 rounded" action="check-login.php" method="post" style="flex-direction: column; ">
				<h1 class="text-center p-3">LOGIN</h1>
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
						<?= $_GET['error'] ?>
					</div>
				<?php } ?>
            
                <div class="form-group">
                    <input type="text" placeholder="Enter Email:" name="email">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                </div>
                <div class="form-btn">
                    <input type="submit" value="Login" name="login" class="btn btn-primary">
                    
                </div>
            </form>
        </div>
       
    </div>
    <div style="margin: 0 1rem 0 1rem;" > <?php  include("./Footor.php");?> </div>

 
 <script src="./css/bootstrap/js/bootstrap.js"></script>
 <script src="./css/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>