<?php
session_start();
require_once 'db.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Fetch messages from database
try {
    $stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY id DESC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Error fetching messages: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Digital Marketing Agency</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .messages-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .message-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            transition: transform 0.2s;
        }
        .message-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }
        .message-sender {
            font-weight: bold;
            color: #333;
        }
        .message-email {
            color: #666;
            font-size: 0.9rem;
        }
        .message-subject {
            color: #444;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        .message-content {
            color: #555;
            line-height: 1.6;
            white-space: pre-wrap;
        }
        .no-messages {
            text-align: center;
            padding: 3rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="messages-container">
        <h1>Contact Messages</h1>
        
        <?php if (isset($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (empty($messages)): ?>
            <div class="no-messages">
                <h2>No messages yet</h2>
                <p>When customers send messages through the contact form, they will appear here.</p>
            </div>
        <?php else: ?>
            <?php foreach ($messages as $message): ?>
                <div class="message-card">
                    <div class="message-header">
                        <div class="message-sender">
                            <?php echo htmlspecialchars($message['name']); ?>
                            <span class="message-email">&lt;<?php echo htmlspecialchars($message['email']); ?>&gt;</span>
                        </div>
                    </div>
                    <div class="message-subject">
                        <?php echo htmlspecialchars($message['subject']); ?>
                    </div>
                    <div class="message-content">
                        <?php echo htmlspecialchars($message['message']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>