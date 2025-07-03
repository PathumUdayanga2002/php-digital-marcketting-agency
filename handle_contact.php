<?php
// Prevent PHP errors from being displayed as HTML
error_reporting(E_ALL);
ini_set('display_errors', '0');

session_start();
header('Content-Type: application/json');

try {
    require_once 'db.php';
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Server configuration error"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION["username"])) {
        http_response_code(403);
        echo json_encode(["error" => "You must be logged in to send a message."]);
        exit;
    }

    // Get form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        http_response_code(400);
        echo json_encode(["error" => "All fields are required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid email format."]);
        exit;
    }

    // Store message in database
    try {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => "Database error occurred."]);
        exit;
    }

    require_once 'config.php';
    
    // Prepare email content
    $to = SMTP_FROM; // Use configured email
    $email_subject = "New Contact Form Message: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n".
        "Name: $name\n".
        "Email: $email\n".
        "Subject: $subject\n".
        "Message:\n$message";

    // Additional headers
    $headers = array(
        'From: ' . SMTP_FROM,
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . phpversion(),
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'SMTPSecure: tls',
        'SMTPAuth: true'
    );

    // SMTP configuration
    ini_set('SMTP', SMTP_HOST);
    ini_set('smtp_port', SMTP_PORT);
    ini_set('sendmail_from', SMTP_FROM);
    
    // Authentication and encryption
    ini_set('smtp_username', SMTP_USERNAME);
    ini_set('smtp_password', SMTP_PASSWORD);
    ini_set('SMTPSecure', 'tls');
    ini_set('SMTPAuth', true);

    // Send email
$mail_result = @mail($to, $email_subject, $email_body, implode("\r\n", $headers));
$mail_error = error_get_last();

if($mail_result) {
    echo json_encode(["success" => "Message sent successfully!"]);
} else {
    http_response_code(500);
    $error_message = $mail_error ? $mail_error['message'] : 'Unknown error';
    error_log("Contact form email error: " . $error_message);
    error_log("SMTP Settings - Host: " . SMTP_HOST . ", Port: " . SMTP_PORT);
    error_log("From: " . SMTP_FROM);
    echo json_encode(["error" => "Failed to send email. Please try again later."]);
}
} else {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed."]);
}