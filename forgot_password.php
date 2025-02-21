<?php
// Include Composer's autoloader
//require 'vendor/autoload.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];  // Get the email from the form

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Set up SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Use the SMTP server of your choice (e.g., for Gmail: smtp.gmail.com)
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com'; // Your email address
    $mail->Password = 'your-email-password'; // Your email password (or App Password if using 2FA)
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // SMTP port (usually 587 for TLS)

    // Set the sender's and recipient's email addresses
    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress($email); // Recipient's email address (the one the user entered)

    // Set email subject and body
    $mail->Subject = 'Password Reset Request';
    $mail->Body    = 'Click the following link to reset your password: <a href="http://yourwebsite.com/reset_password.php?email=' . urlencode($email) . '">Reset Password</a>';

    // Send the email
    if (!$mail->send()) {
        echo 'Error sending reset email: ' . $mail->ErrorInfo;
    } else {
        echo 'A reset link has been sent to your email address!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>

    <h2>Enter your email to reset your password:</h2>
    
    <form method="POST" action="reset_password.php">
        <input type="email" name="email" required placeholder="Enter your email">
        <button type="submit">Send Reset Link</button>
    </form>

</body>
</html>
