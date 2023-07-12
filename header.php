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

<header class="header">
    <div class="flex">

<a href="#" class="logo"> anime </a>
<nav class="navbar">
    <a href="admin.php"> add products </a>
    <a href="products.php"> View products </a>
</nav>
<?php 

$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);

?>

<a href="cart.php" class="cart"> cart <span>  <?php echo $row_count;?></span> </a>
<div id="menu-btn" class="fas fa-bars"></div>

    </div>
</nav>
</header>