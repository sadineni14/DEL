<?php
session_start();
include('co1.php'); // Database connection

// Check if OTP exists in the session
if (!isset($_SESSION['otp_email']) || !isset($_SESSION['otp'])) {
    die("❌ Invalid OTP request.");
}

// Validate the OTP input from the user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];

    // Check if OTP matches the one stored in session
    if ($entered_otp == $_SESSION['otp']) {
        // OTP is correct, proceed with registration

        // Fetch the user data from session
        $username = $_SESSION['username']; // Make sure username is in session
        $email = $_SESSION['otp_email'];   // Email from session
        $password = $_SESSION['password']; // Password hash from session

        // Ensure the username is not null
        if (empty($username)) {
            die("❌ Username cannot be empty.");
        }

        // Check if the username already exists in the database
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Username already exists, show an error
            echo "❌ Error: Username already taken. Please choose a different username.";
            $stmt->close();
            exit();
        }
        $stmt->close();

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "✅ OTP Verified Successfully!";
            header("Location: login.php");  // Redirect to login page after successful registration
            exit();
        } else {
            die("❌ Error: " . $stmt->error);  // Handle database error
        }
    } else {
        echo "❌ Invalid OTP entered.";
    }
}
?>
