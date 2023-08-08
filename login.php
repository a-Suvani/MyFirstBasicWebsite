<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id(); //Prevents session fixation attack
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<style>
        body {
          
            justify-content: center; /* Center horizontally */
            align-items: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 15;
            font-family: Arial, sans-serif;
            background-color: black;
        }

        .container {
    align-content: center;
    max-width: 600px;
    padding: 129px;
    background-color: transparent;
    position: relative;
}

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: pink;
        }

        em {
            display: block;
            text-align: center;
            color: #ff4444;
            margin-bottom: 10px;
            font-size: 30px;;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #444;
            font-size: 30px;
            color: white;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-weight: 700;
            color: red;
          
        }

        button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: palevioletred;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 26px;
            font-weight: bold;
        }

        button:hover {
            background-color: #006666;
        }
    </style>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <div class="container">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
    </div>
</body>
</html>