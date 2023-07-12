<!-- authenticate.php -->
<?php
session_start();

// Define the admin username and password
$admin_username = 'admin';
$admin_password = 'password';

// Get the submitted username and password
$submitted_username = $_POST['username'];
$submitted_password = $_POST['password'];

// Check if the submitted credentials match the admin credentials
if ($submitted_username === $admin_username && $submitted_password === $admin_password) {
    // Authentication successful
    $_SESSION['admin'] = true; // Store a flag in the session to indicate admin login
    header('Location: products.php'); // Redirect to the products page
    exit();
} else {
    // Authentication failed
    echo 'Invalid username or password';
}
?>
