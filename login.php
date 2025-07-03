<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"], $_POST["password"])) {
    $input_user = trim($_POST["username"]);
    $input_pass = $_POST["password"];

    try {
        $stmt = $pdo->prepare("SELECT username, password FROM users WHERE username = ?");
        $stmt->execute([$input_user]);
        $user = $stmt->fetch();

        if ($user && password_verify($input_pass, $user['password'])) {
            $_SESSION["username"] = $user['username'];
            session_regenerate_id(true); // Prevent session fixation
            header("Location: index.php");
            exit;
        } else {
            $error = "Invalid username or password";
        }
    } catch(PDOException $e) {
        error_log($e->getMessage());
        $error = "An internal error occurred. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Ensure this path is correct -->
</head>
<body class="login-page">
    <section class="signup-section">
        <h2>Login</h2>
        
        <?php 
        if (!empty($error)) {
            echo "<p class='signup-message' style='color: #ff6b6b;'>" . htmlspecialchars($error) . "</p>"; 
        }
        if (isset($_GET['registered'])) {
            echo "<p class='signup-message'>Registration successful! Please login.</p>";
        }
        ?>

        <form method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>

        <p style="text-align: center; color: #cbd7ff; margin-top: 1rem;">
            Don't have an account? <a href="register.php" style="color: #58a6ff;">Register here</a>
        </p>
    </section>
</body>
</html>
