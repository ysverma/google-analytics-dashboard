<?php
    if (isset($_POST["submit"])) {
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];
        $domainname = $_POST["domainname"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if (empty($fullName) or empty($email) or empty($domainname) or empty($password) or empty($passwordRepeat)) {
            array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
        if (!filter_var($domainname)) {
            array_push($errors, "domain is not valid");
        }
        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 charactes long");
        }
        if ($password !== $passwordRepeat) {
            array_push($errors, "Password does not match");
        }

        require_once "Database.php";

        $sql = "SELECT * FROM users WHERE email = '$email' AND domain='domainname'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            array_push($errors, "Email and domain already exists!");
        }

        if (count($errors) > 0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {

            $sql = "INSERT INTO users (username, email,domain, password) VALUES (?, ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "ssss", $fullName, $email,$domainname, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            } else {
                die("Something went wrong");
            }
        }
    }
    ?>