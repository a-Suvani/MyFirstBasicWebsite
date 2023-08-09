<?php require("database.php")?>
<?php require("config.php")?>
<html>
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

<?php
function input_filter($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

if(isset($_POST['Login']))
{
    $AdminName = $_POST['AdminName'];
    $AdminPassw = $_POST['AdminPassw'];

    // Assuming you have established a database connection named $conn
    $AdminName = mysqli_real_escape_string($conn, $AdminName);
    $AdminPassw = mysqli_real_escape_string($conn, $AdminPassw);

    $query = "SELECT * FROM `admin_logi` WHERE `Admin_Name`=? AND `Admin_Password`=?";
    
    if($stmt = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($stmt, "ss", $AdminName, $AdminPassw);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt)==1)
        {
            session_start();
            $_SESSION['AdminLoginId']=$AdminName;
            header("location: admin.php");
        }
        else
        {
            echo "<script>alert('Invalid admin name or password');</script>";
        }
        mysqli_stmt_close($stmt);
    }

    else
    {
        echo "<script>alert('Invalid admin name or password');</script>";
    }
}
    
