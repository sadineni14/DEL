<?php
// reset_password_process.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'co1.php'; // Include the correct database connection file

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_POST['token'];

    // Check if the passwords match
    if ($new_password != $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Validate token and update password
    $sql = "SELECT id FROM users WHERE reset_token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Token is valid, update password and remove the reset token
        $sql = "UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $hashed_password, $token);

        if ($stmt->execute()) {
            echo "Password successfully updated! You can now <a href='login.php'>login</a>.";
        } else {
            echo "Error resetting password.";
        }
    } else {
        echo "Invalid or expired token.";
    }
}
?>
