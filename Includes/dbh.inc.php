<?php

$servername = "127.0.0.1";
$dBUsername = "admin";
$dBPassword = "admin";
$dBName = "sapiens";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}