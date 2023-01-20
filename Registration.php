<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
             
                <div class="logo mt-1 ">
						<img src="./assets/logo.png"   href="index.php" alt="logo">
					</div>
                <h5>Registration Form </h5>

            </div>
        </nav>
        
        <?php include("./api/Register.php"); ?>

        <form action="Registration.php" method="post">
          
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Enter Your Full Name:">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder=" Enter Your Email:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="domainname" placeholder="Enter Your Website Name:">
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
            <div>
                <p>Already Registered <a href="index.php">Login Here</a></p>
            </div>
        </div>
    </div>
</body>

</html>