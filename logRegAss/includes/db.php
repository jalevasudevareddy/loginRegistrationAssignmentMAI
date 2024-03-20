<?php
// db.php

// Database configuration
$servername = "127.0.0.1";
$username = "root";
$password = "9505980354aA@";
$database = "multiplierai";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>