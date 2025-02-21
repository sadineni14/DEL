<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Ensure the database connection is included
include('co1.php'); // Ensure database connection works

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure Composer autoload is included

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];  // Get the email from the form

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id, username FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch username from database and store it in the session
        $stmt->bind_result($id, $username);
        $stmt->fetch();
        $_SESSION['username'] = $username;  // Store the username in session
        $_SESSION['otp_email'] = $email;    // Store the email in session

        // Generate OTP
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        $_SESSION['otp'] = $otp; // Store OTP in session

        // Send OTP via Email (Using PHPMailer)
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Use Gmail's SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'rohithreddygade321@gmail.com'; 
        $mail->Password = 'qorm piou gtuc qwre';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // SMTP port

            $mail->setFrom('your-email@gmail.com', 'Your Website');
            $mail->addAddress($email);  // Send OTP to user email
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "Your OTP code is: $otp. It is valid for 5 minutes.";

            if ($mail->send()) {
                // Redirect to OTP verification page after sending OTP
                header("Location: otp_verification.php");
                exit();
            } else {
                echo "Error sending OTP: " . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        echo 'Email address not found!';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #3a8d99, #68b3b7);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .otp-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .otp-container h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .otp-container input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background: #f9f9f9;
        }

        .otp-container input[type="email"]:focus {
            border-color: #68b3b7;
            outline: none;
        }

        .otp-container button {
            width: 100%;
            padding: 12px;
            background-color: #68b3b7;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .otp-container button:hover {
            background-color: #56a0a0;
        }

        .otp-container .error {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }

        .otp-container .success {
            color: green;
            font-size: 14px;
            margin-top: 15px;
        }

        .back-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .back-link a {
            color: #68b3b7;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="otp-container">
        <h1>Enter your email to reset your password:</h1>
        <!-- Form to collect user info -->
        <form method="POST" action="send_reset_email.php">
            <input type="email" name="email" required placeholder="Enter your email"><br>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>

</body>
</html>
