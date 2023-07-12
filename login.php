<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection
    $mysqli = require __DIR__ . "/database.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to fetch user details
    $sql = "SELECT * FROM shop_db.users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user["password"])) {
            session_start();
            session_regenerate_id(); // Prevents session fixation attack

            $_SESSION["user_id"] = $user["id"];

            // Perform user role check and set the role in the session
            if ($user["role"] === "admin") {
                $_SESSION["user_role"] = "admin";
            } else {
                $_SESSION["user_role"] = "user";
            }

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
</head>
<body>
    <h2>Login</h2>
    <?php if ($is_invalid): ?>
        <p>Invalid email or password. Please try again.</p>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

