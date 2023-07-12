<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name"])) {
        die("Name is required");
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
    }

    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }

    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter");
    }

    if (!preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number");
    }

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match");
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $mysqli = require __DIR__ . "/database.php";

    $sql = "INSERT INTO shop_db.users (name, email, password)
            VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss",
        $_POST["name"],
        $_POST["email"],
        $password_hash);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        if ($mysqli->errno === 1062) {
            die("Email already taken");
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
    <style>
        .title {
            text-align: start;
            margin-top: -700px;
            margin-right: 80px;
            animation: bounce 5s infinite;
            font-size: 60px;
            font-weight: bolder;
            color: rgb(4, 45, 107);
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
    <div class="title">
        <p>Signup Page</p>
    </div>
    <div class="image">
        <img src="signuppage.gif" alt="gif">
    </div>
    <div class="form-container">
        <h2 class="form-title">Sign up for more Updates</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" class="form-input" name="name" placeholder="Your Name" required>
            <input type="email" class="form-input" name="email" placeholder="Your Email" required>
            <input type="password" class="form-input" name="password" id="password" placeholder="Your Password" required>
            <span class="error-message" id="password-error"></span>
            <input type="password" class="form-input" name="password_confirmation" id="confirm-password" placeholder="Confirm Password" required>
            <span class="error-message" id="confirm-password-error"></span>
            <button type="submit" class="form-button" id="login-button">Sign Up</button>
        </form>
    </div>

    <script>
        const passwordInput = document.getElementById("password");
        const confirmInput = document.getElementById("confirm-password");
        const passwordError = document.getElementById("password-error");
        const confirmError = document.getElementById("confirm-password-error");

        passwordInput.addEventListener("input", validatePassword);
        confirmInput.addEventListener("input", validateConfirmPassword);

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
    </script>
</body>

</html>
