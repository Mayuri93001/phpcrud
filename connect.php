<?php
// Database connection details
$servername = "localhost";
$username = "root"; 
$password_db = ""; 
$dbname = "first_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password_db, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
