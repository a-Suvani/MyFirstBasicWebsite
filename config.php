<!-- <?php 
$conn = mysqli_connect('localhost', 'root', '', 'shop_db') or die('Connection failed');
?> -->

// config.php
<?php
// config.php

$host = "localhost";
$username = "root";
$password = "";
$database = "shop_db";

// Create a new MySQLi object and establish a connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Connected successfully!";
}

// Return the MySQLi object
return $mysqli;


?>
