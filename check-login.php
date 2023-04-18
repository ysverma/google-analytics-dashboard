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
            $_SESSION['userid'] = $user['id'];
            
             if ($_SESSION['domainname'] === "admin") {
                if ($_SESSION['role'] === 'admin') {
                    
                    echo "<script> window.location.href = 'admin/Admin-Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for admin domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "dotzoo.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/dotzoo/Dotzoo-Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for dotzoo.com domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "dotzoo.net") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/dotzooDotNet/DotzooDotNetDashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for dotzoo.net domain'; </script>";
                    exit;
                }
            }
            else if ($_SESSION['domainname'] === "dzoapps.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/dzoapps/DzoappsDashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for dzoapps.com domain'; </script>";
                    exit;
                }
            } else if ($_SESSION['domainname'] === "edmondsbaydental.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/edmonds_bay_dental/EbdDashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for edmondsbaydental.com domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "pacifichighwaydental.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/PHD/PHD_Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for pacifichighwaydental.com domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "ie-rm.org") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/IERM/IERM_Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for ie-rm.org domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "cascadethermal.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/Cascade/Cascade_Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for cascadethermal.com domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "exserosoft.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/Exserosoft/Exserosoft_Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for exserosoft.com domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "FoldnGoBikes.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/FoldnGoBike/FoldnGoBike_Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for FoldnGoBikes.com domain'; </script>";
                    exit;
                }
            }else if ($_SESSION['domainname'] === "ppemart.com") {
                if ($_SESSION['role'] === 'user') {
                    echo "<script> window.location.href = 'users/PPE-Mart/PPE-Mart_Dashboard.php'; </script>";
                    exit;
                } else {
                    echo "<script> window.location.href = 'index.php?error=Invalid role for ppemart.com domain'; </script>";
                    exit;
                }
            }
            else {
                echo "<script> window.location.href = 'index.php?error=Invalid domain name'; </script>";
                exit;
            }
        } else {
            echo "<script> window.location.href = 'index.php?error=Password does not match'; </script>";
            exit;
        }
    } else {
        echo "<script> window.location.href = 'index.php?error=Email does not match'; </script>";
        exit;
    }
}
?>
