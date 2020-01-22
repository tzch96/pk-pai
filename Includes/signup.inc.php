<?php

if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['signup-username'];
    $email = $_POST['signup-email'];
    $password = $_POST['signup-password'];
    $passwordRepeat = $_POST['signup-password-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?error=emptyfields&signup-username=" . $username . "&signup-email=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalidemailandusername");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidemail&signup-username=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalidusername&signup-email=" . $email);
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../index.php?error=passwordcheck&signup-username=" . $username . "&signup-email=" . $email);
        exit();
    } else {

        $sql = "SELECT usernameUsers FROM users WHERE usernameUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $numRows = mysqli_stmt_num_rows($stmt);
            if ($numRows > 0) {
                header("Location: ../index.php?error=usernametaken&signup-email=" . $email);
                exit();
            } else {

                $sql = "INSERT INTO users (usernameUsers, emailUsers, passwordUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    header("Location: ../index");
    exit();
}