<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: DzoappsShow.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
            </nav>
           
            <?php  include("./api/login.php");?>

            <div class="mt-2">
                <h3>Login Form</h3>
            </div>

            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Enter Your Website:" name="domainname" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Enter Email:" name="email" class="form-control">
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
</body>

</html>