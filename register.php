<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $email = trim($_POST["email"]);
    $contact = trim($_POST["contact"]);

    try {
        // Check if username already exists
        $stmt = $pdo->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() > 0) {
            $error = "Username already exists";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            $stmt = $pdo->prepare("INSERT INTO users (username, password, email, contact) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $hashedPassword, $email, $contact]);

            // Redirect to login page
            header("Location: login.php?registered=1");
            exit;
        }
    } catch(PDOException $e) {
        error_log($e->getMessage());
        $error = "Registration failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="register-page">
    <section class="signup-section">
        <h2>Register</h2>

        <?php if (!empty($error)): ?>
            <p class="signup-message" style="color: #ff6b6b;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter username" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter password" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter email" required>

            <label for="contact">Contact Number</label>
            <input type="text" name="contact" id="contact" placeholder="Enter contact number" required>

            <button type="submit">Register</button>
        </form>

        <p style="text-align: center; color: #cbd7ff; margin-top: 1rem;">
            Already have an account? <a href="login.php" style="color: #58a6ff;">Login here</a>
        </p>
        
        <p style="text-align: center; color: #cbd7ff; margin-top: 0.5rem;">
            <a href="index.php" style="color: #58a6ff;">← Back to Home</a>
        </p>
    </section>
</body>
</html>
