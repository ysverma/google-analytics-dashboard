<?php
session_start();
if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $_SESSION["email"] = $email;
    $password = $_POST["password"];

    require_once "./api/Database/DbConfig.php";
    
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {
        if (password_verify($password, $user["password"])) {
    
            $_SESSION["user"] = "yes";
            $_SESSION["domainname"] = $user['domain'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            
    
            switch ($_SESSION['domainname']) {
                case "dotzoo.net":
                    if ($_SESSION['role'] === 'admin') {
                        header("Location: admin/admin-Dashboard.php");
                    } else {
                        echo "<div class='alert alert-danger'>Invalid role for dotzoo.net domain</div>";
                    }
                    break;
                case "dzoapps.com":
                    if ($_SESSION['role'] === 'user') {
                        header("Location: users/dzoapps/DzoappsDashboard.php");
                    } else {
                        echo "<div class='alert alert-danger'>Invalid role for dzoapps.com domain</div>";
                    }
                    break;
                case "edmondsbaydental.com":
                    if ($_SESSION['role'] === 'user') {
                        header("Location: users/edmonds_bay_dental/EbdDashboard.php");
                    } else {
                        echo "<div class='alert alert-danger'>Invalid role for edmondsbaydental.com domain</div>";
                    }
                    break;
                
                default:
                    echo "<div class='alert alert-danger'>Invalid domain name</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    }else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}    
?>