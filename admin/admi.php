<?php
// Replace these values with your actual database credentials
$host = 'shop_db';
$username = 'root';
$password = '';
$dbname = 'shop_db';

// Database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to filter user input
function input_filter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Place this code at the top before the HTML
if (isset($_POST['login'])) {
    // Filtering user's input
    $name = input_filter($_POST['AdminName']);
    $AdminPass = $_POST['AdminPass'];

    // To protect from SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $AdminPass = mysqli_real_escape_string($conn, $AdminPass);

    // SQL query with backticks for table and column names
    $query = "SELECT * FROM `admin_login` WHERE `Admin_Name`=? AND `Admin_Password`=?";

    // Prepared statement
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ss", $name, $AdminPass);
        mysqli_stmt_execute($stmt);

        // Fetch results if needed

        echo "prepared";
    } else {
        echo "SQL QUERY CANNOT BE PREPARED";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <h2>Login</h2>
                <label for="name" class="em">admin-name</label>
                <input type="text" id="email" class="input" placeholder="AdminName" name="AdminName">
                <label for="password" class="pw">Password</label>
                <input type="password" id="password" class="input" placeholder="Password" name="AdminPass"> 
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
