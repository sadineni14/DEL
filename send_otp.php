<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Ensure the database connection is included
include('co1.php'); // Ensure database connection works

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Generate OTP
    $otp = rand(100000, 999999); // Generate a 6-digit OTP
    $_SESSION['otp'] = $otp; // Store OTP in session
    $_SESSION['otp_email'] = $email; // Store email in session

    // Store user data in session to use later
    $_SESSION['username'] = $username;
    $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT); // Hash password

    // Send OTP via Email (Using PHPMailer)
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rohithreddygade321@gmail.com'; 
        $mail->Password = 'qorm piou gtuc qwre';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('jagadeeshsadineni5@gmail.com', 'Your Website');
        $mail->addAddress($email);  // Send OTP to user email
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is: $otp. It is valid for 5 minutes.";

        if ($mail->send()) {
            // Redirect to OTP verification page after sending OTP
            header("Location: otp_verification.php");
            exit();
        } else {
            echo "Error sending OTP.";
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Receive OTP</title>
    <style>
        /* Universal Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Animated Background */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at center, #000428, #004e92);
            overflow: hidden;
            animation: neonPulse 5s infinite alternate;
        }

        @keyframes neonPulse {
            0% { background: radial-gradient(circle at center, #000428, #004e92); }
            100% { background: radial-gradient(circle at center, #001F3F, #0066cc); }
        }

        /* Floating Form Container */
        .otp-container {
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(0, 255, 255, 0.2);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            width: 360px;
            position: relative;
            backdrop-filter: blur(15px);
            animation: floatEffect 3s ease-in-out infinite;
        }

        @keyframes floatEffect {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Neon Text */
        .neon-text {
            color: #0ff;
            text-shadow: 0 0 10px #0ff, 0 0 20px #00ffff, 0 0 40px #00ffff;
        }

        /* Input Fields */
        .otp-container input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 2px solid transparent;
            border-radius: 8px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: #0ff;
            text-align: center;
            transition: 0.3s;
        }

        .otp-container input::placeholder {
            color: rgba(0, 255, 255, 0.5);
        }

        .otp-container input:focus {
            border-color: #0ff;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
            outline: none;
        }

        /* Futuristic Buttons */
        .otp-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #ff00ff, #00ffff);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .otp-container button:hover {
            background: linear-gradient(to right, #00ffff, #ff00ff);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 255, 255, 0.4);
        }

        /* Error / Success Messages */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-top: 15px;
        }

        /* Back Link */
        .back-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .back-link a {
            color: #00ffff;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
            color: #ff00ff;
        }

        /* Floating Particles */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background: #0ff;
            border-radius: 50%;
            opacity: 0.8;
            animation: particleAnimation 10s infinite linear;
        }

        @keyframes particleAnimation {
            from { transform: translateY(0); opacity: 0.8; }
            to { transform: translateY(-100vh); opacity: 0; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .otp-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Floating Particles -->
    <div class="particles">
        <script>
            for (let i = 0; i < 50; i++) {
                let particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + "vw";
                particle.style.top = Math.random() * 100 + "vh";
                particle.style.animationDuration = (Math.random() * 5 + 5) + "s";
                document.querySelector(".particles").appendChild(particle);
            }
        </script>
    </div>

    <!-- OTP Form -->
    <div class="otp-container">
        <h1 class="neon-text">Register</h1>
        <form method="POST" action="send_otp.php">
            <input type="text" name="username" placeholder="Enter your username" required><br>
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <input type="password" name="password" placeholder="Enter your password" required><br>
            <button type="submit">Send OTP</button>
        </form>

        <!-- Back Link -->
        <div class="back-link">
            <p><a href="login.php">Already have an account? Login here</a></p>
        </div>
    </div>

</body>
</html>
