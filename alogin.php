<?php
session_start();

// Check if the login form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the credentials (replace with your own validation logic)
    if ($username === 'suvani' && $password === 'P@ssWorD!@#1') {
        // Set session variable to indicate successful login
        $_SESSION['loggedin'] = true;

        // Redirect to the admin page
        header('Location: admin.php');
        exit();
    } else { 
        // Invalid credentials, display an error message
        echo 'Invalid username or password';
    }
}
?>

<!-- 

<?php
// // a.php - Admin-only page

// session_start();

// // Check if the user is logged in and their username is "suvani" (your admin username)
// $is_admin = isset($_SESSION["username"]) && $_SESSION["username"] === "suvani";

// // Check if the request is coming from the login page (alogin.php) or other authorized sources
// $referer = $_SERVER['HTTP_REFERER'];
// $allowed_referer = "www.youtube.com"; // Replace this with the URL of your login page

// if (!$is_admin || $referer !== $allowed_referer) {
//     header("Location: alogin.php"); // Redirect to the login page if not logged in as admin or if the referer is not authorized
//     exit;
// }
// ?> -->
<?php
// Including the configuration file
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

function input_filter($data){
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if(isset($_POST['Login'])){
    if(isset($POST['Login'])){
        $AdminName = input_filter($_POST['AdminName']);
        $AdminPassw = $_POST['AdminPassw'];
    }
   
    // Escaping special symbols used in SQL statement
    $AdminName = mysqli_real_escape_string($conn, $AdminName); #escapes the special characters of a string that is present on our sql statement
    $AdminPassw = mysqli_real_escape_string($conn, $AdminPassw);

    // Query Template
    $query = "SELECT * FROM `admin_logi` WHERE `admin_name`=? AND `admin_password`=?";

    // Prepared statement to protect from SQL injection
    if($stmt = mysqli_prepare($conn, $query)){
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ss", $AdminName, $AdminPassw);
        // Execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // You can fetch the result and process it here
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
                session_start();
                $_SESSION['AdmiLoginId'] = $AdminName;
                header('Location: admin.php');
                exit();
            } else {
                echo "Invalid Admin Name or Password.";
            }
        } else {
            echo "Login Failed!";
        }
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case when the prepared statement could not be created
        echo "SQL query cannot be created: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <style>
        
        *{
            padding:0;
            margin:0;
            box-sizing: border-box;
            font-family: poppins;
        }
        body{
            background-color: rgb(110, 174, 231);
        }
        div.container{
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: rgb(153, 185, 235);
            padding:30px;
            box-shadow: 0 50px 50px -50px darkslategrey;
        }
        div.container div.myform{
            width: 200px;
            height: 260px;
            margin-right: 30px;
        }
        div.container div.myform h2{
            color: black;
            margin-bottom: 20px;
        }

        div.container div.myform input {
            border:none;
            outline: none;
            border-radius: 0;
            width: 100%;
            border-bottom: 2px solid black;
            margin-bottom: 25px;
            padding:7px 0;
            font-size: 14px;
        }
        div.container div.myform button{
            color:white;
            background-color: black;
            border:none;
            outline:none;
            border-radius: 2px;
            font-size:14px;
            padding:5px;
            font-weight: 500px;
        }
        div.container div.image img{
            width: 300px;

        }
    </style>
   
</head>
<body>
    <div class="container">
        <div class="myform">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <h2>ADMIN LOGIN</h2>
               
                <input type="text" placeholder="AdminPanel" name="AdminName">
                <input type="password" placeholder="Password" name="AdminPassw">
                <button type="submit" name="Login">Login</button>
            </form>
        </div>
        <div class="image">  
            <img src="https://media.tenor.com/pfse31BHBoYAAAAd/kikis-delivery-service-ghibli.gif" width="200px" height="200px">
        </div>
    </div>
</body>
</html>

