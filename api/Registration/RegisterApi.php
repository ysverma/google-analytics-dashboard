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
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }

    require_once __DIR__ . "/api/Database/DbConfig.php";

    $query = "SELECT * FROM users WHERE domain=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $domainname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        array_push($errors, "domain already exists!");
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
        echo "<div class='alert alert-success'>You are registered successfully.</div>";
    }
}
?>
