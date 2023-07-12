<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "shop_db";

// Create a new MySQLi object and establish a connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
