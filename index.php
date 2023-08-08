 <?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style0.css">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&family=Kanit&family=Playfair:ital@1&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
</head>
<body>
     <div class="navbar">

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about-us.php">Aboutus</a></li>
            <li><a href="check.php">Ratings</a></li>
            <li><a href="products.php">Shop</a></li>
            <?php if (isset($user)): ?>
        
        <li><a href=""> Hello <?= htmlspecialchars($user["name"]) ?></a></li>
        
        <li><a href="logout.php">Log out</a></li>
        
    <?php else: ?>
        
        <li><a href="signp.php">Signup</a></li>  
            <li><a href="login.php">Login</a></li>          
    <?php endif; ?>
       

        </ul>
        </div>
        <div class="logo">

            <img src="assets/image/logo-removebg-preview (2).png">
        </div>
       <p class="intro">Welcome to Ghibli <br>Movie site</p>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class ="flip-card-front">

                </div>

                <div class="flip-card-back">
                </div>
            </div>
        </div>
        <div class="flip-card2">
            <div class="flip-card2-inner">
                <div class ="flip-card2-front">
                </div>
                <div class="flip-card2-back">
                </div>
            </div>
        </div>
        <div class=" pass-by">
            <img src="assets/image/noface-removebg-preview.png">
        </div>
        <div class="flip-card3">
            <div class="flip-card3-inner">
                <div class ="flip-card3-front">
                </div>j
                <div class="flip-card3-back">
                </div>
            </div>
        </div>
        <div class="flip-card4">
            <div class="flip-card4-inner">
                <div class ="flip-card4-front">
                </div>j
                <div class="flip-card4-back">
                </div>
            </div>
        </div>
          
</body>
</html>