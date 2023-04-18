<?php

if (isset($_POST["submit"])) {
    $fullName = $_POST["fullname"] ?? '';
    $email = $_POST["email"] ?? '';
    $domainname = $_POST["domainname"] ?? '';
    $role = $_POST["role"] ?? '';
    $password = $_POST["password"] ?? '';
    $passwordRepeat = $_POST["repeat_password"] ?? '';

    $errors = [];

    if (empty($fullName) or empty($email) or empty($domainname) or empty($password) or empty($passwordRepeat) or empty($role)) {
        // array_push($errors, "All fields are required");
        echo "<script> window.location.href = 'Registration.php?error=All fields are required!' </script>";
    }else
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // array_push($errors, "Email is not valid");
        echo "<script> window.location.href = 'Registration.php?error=Email is not valid!' </script>";
    }else
    if (strlen($password) < 8) {
        // array_push($errors, "Password must be at least 8 characters long");
        echo "<script> window.location.href = 'Registration.php?error=Password must be at least 8 characters long!' </script>";
    }else
    if ($password !== $passwordRepeat) {
        // array_push($errors, "Password does not match");
        echo "<script> window.location.href = 'Registration.php?error=Password does not match!' </script>";
    }else{

    require_once __DIR__ . "/api/Database/DbConfig.php";

    $query = "SELECT * FROM users WHERE domain=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $domainname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        echo "<script> window.location.href = 'Registration.php?error=domain already exists!' </script>";
    }
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, domain, role, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $fullName, $email, $domainname, $role, $passwordHash);
        mysqli_stmt_execute($stmt);
          echo "<script> window.location.href = 'Registration.php?Message=You are registered successfully.' </script>";
    }
}}else{
    echo "<script> window.location.href = 'Registration.php?error=Please fill all the fields' </script>";
}
?>
