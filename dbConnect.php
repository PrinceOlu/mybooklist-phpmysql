<?php  
// Database configuration
$dbHost = "localhost";
$dbUser = "root";
$dbPwd = "";
$dbName = "mybooklist";

// Create connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPwd, $dbName);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully to the database!";
?>
