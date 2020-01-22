<?php

$db_host = "127.0.0.1";
$db_username = "admin";
$db_password = "admin";
$db_name = "sapiens";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}