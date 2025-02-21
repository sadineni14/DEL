<?php
session_start();
include('co1.php'); // Database connection

// Check if the token exists in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate the token and check if it exists in the database
    $stmt = $conn->prepare("SELECT * FROM password_resets WHERE token = ? AND expiry_time > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Token is valid, show the reset form
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
            $new_password = $_POST['password'];

            // Update the user's password
            $row = $result->fetch_assoc();
            $email = $row['email'];

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash the new password

            // Update the password in the users table
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashed_password, $email);
            $stmt->execute();

            // Delete the token from the database after successful password reset
            $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
            $stmt->bind_param("s", $token);
            $stmt->execute();

            echo "Password has been reset successfully. <a href='login.php'>Login</a>";
        }
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No token found.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>

    <h2>Reset Your Password</h2>

    <form method="POST" action="reset_password.php?token=<?php echo $_GET['token']; ?>">
        <input type="password" name="password" placeholder="Enter your new password" required><br>
        <button type="submit">Reset Password</button>
    </form>

</body>
</html>
