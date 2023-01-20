<?php
if (isset($_POST["login"])) {
    $domainname = $_POST['domainname'];
    $_SESSION["domainname"] = $domainname;
    $email = $_POST["email"];
    $_SESSION["email"] = $email;

    $password = $_POST["password"];
    require_once "Database.php";
    $sql = "SELECT * FROM users WHERE email = '$email' AND domain = '$domainname'";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();

            $_SESSION["user"] = "yes";
            header("Location: DzoappsShow.php");
            die();
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    }    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   echo "<div class='alert alert-danger'> Email is not valid</div>";
    }
     else {
        echo "<div class='alert alert-danger'>Domain does not match</div>";
    }
}
