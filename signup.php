<?php
// Database connection
$host = 'your_host';
$db   = 'animewebsite';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Signup process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Insert user data into the database
  $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
  $stmt->execute([$username, $password]);

  // Redirect to a success page or perform additional actions
  header('Location: success.html');
  exit();
}
?>
