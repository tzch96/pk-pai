<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['login-username'];
    $password = $_POST['login-password'];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['passwordUsers']);
                if ($passwordCheck == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                } else if ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUsername'] = $row['usernameUsers'];
                    $_SESSION['userRole'] = $row['roleUsers'];

                    if ($_SESSION['userRole'] == "admin") {
                        header("Location: ../admin");
                        exit();
                    } else {
                        header("Location: ../dashboard");
                        exit();
                    }
                } else {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }

        }
    }

} else {
    header("Location: ../index");
    exit();
}