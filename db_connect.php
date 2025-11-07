<?php
// Database connection settings
$servername = "localhost"; // add your MySQL servername if diiferent
$username = ""; // add your MySQL username
$password = ""; // add your MySQL password if set
$dbname = "user_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
