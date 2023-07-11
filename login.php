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
        
        if (password_verify($_POST["password"], $user["password"])) {
            
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
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Signup page</title>
  <style>
    .title {
    text-align:start;
    margin-top: -700px;
    margin-right: 80px;
    animation: bounce 5s infinite;
    font-size: 60px;
    font-weight: bolder;
    color:rgb(4, 45, 107);
  }

  @keyframes bounce {
    0% {
      transform: translateY(-10px);
    }
    50% {
      transform: translateY(10px);
    }
    100% {
      transform: translateY(-10px);
    }
  }
    .image img {
      width: 300px;
      height: 280px;
      margin-left: 70px;
      margin-right: 160px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');
    body {
      background-color: #80a5dd;
      font-family: 'Roboto', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      height: 480px;
      background-color: #FFFFFF;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 400px;
      width: 100%;
      box-sizing: border-box;
    }
    .form-title {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #333333;
    }
    .form-input {
      width: 100%;
      padding: 12px;
      border: none;
      background-color: #F2F3F7;
      border-radius: 8px;
      margin-bottom: 15px;
      font-size: 16px;
      color: #333333;
      outline: none;
      transition: background-color 0.3s ease;
    }
    .form-input::placeholder {
      color: #9C9C9C;
    }
    .form-input:focus {
      background-color: #E5E7EB;
    }
    .form-button {
      width: 100%;
      padding: 12px;
      border: none;
      background-color: #0062e3;
      border-radius: 8px;
      font-size: 18px;
      color: #FFFFFF;
      cursor: pointer;
      outline: none;
      transition: background-color 0.3s ease;
    }
    .form-button:hover {
      background-color: #0053a6;
    }
    .error-message {
      color: red;
      margin-top: 5px;
      font-size: 14px;
    }
    .verification-code-input {
      display: none;
    }
  </style>
</head>

<body>
<?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
 <div class="title">
    <p> Signup Page</p>
 </div> 
 <div class="image">
    <img src="signuppage.gif" alt="gif">
  </div>
  <div class="form-container">
    <h2 class="form-title">Sign up for more Updates</h2>
    <form method="post">
        <label for="email">email</label>
        <input class="form-input" type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input class="form-input" type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
  </div>

  <script>
    const passwordInput = document.getElementById("password");
    const confirmInput = document.getElementById("confirm-password");
    const passwordError = document.getElementById("password-error");
    const confirmError = document.getElementById("confirm-password-error");
    const loginButton = document.getElementById("login-button");
    const verificationCodeInputs = document.getElementsByClassName("verification-code-input");

    passwordInput.addEventListener("input", validatePassword);
    confirmInput.addEventListener("input", validateConfirmPassword);
    loginButton.addEventListener("click", showVerificationCodeInputs);

    function validatePassword() {
      const password = passwordInput.value;
      const specialChars = /[!@#$%^&*(),.?":{}|<>]/;

      if (password.length < 8 || !specialChars.test(password)) {
        passwordError.textContent = "Password must be at least 8 characters long and contain a special character.";
        passwordInput.setCustomValidity("Invalid password");
      } else {
        passwordError.textContent = "";
        passwordInput.setCustomValidity("");
      }
    }

    function validateConfirmPassword() {
      const password = passwordInput.value;
      const confirmPassword = confirmInput.value;

      if (password !== confirmPassword) {
        confirmError.textContent = "Passwords do not match.";
        confirmInput.setCustomValidity("Passwords do not match");
      } else {
        confirmError.textContent = "";
        confirmInput.setCustomValidity("");
      }
    }

    function showVerificationCodeInputs() {
      for (let i = 0; i < verificationCodeInputs.length; i++) {
        verificationCodeInputs[i].style.display = "block";
      }
      loginButton.style.display = "none";
    }
  </script>
</body>

</html>
