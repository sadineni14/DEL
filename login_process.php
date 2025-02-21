<?php
session_start();  // Start the session to use session variables

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fuel_delivery_');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare SQL query to check user credentials
$sql = "SELECT id, username, password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $db_username, $db_password);

// Check if a record was found for the username
if ($stmt->num_rows > 0) {
    $stmt->fetch();

    // Verify the password entered by the user with the hashed password from the database
    if (password_verify($password, $db_password)) {
        // Password is correct, set session variables
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $db_username;

        // Redirect to the dashboard page after successful login
        header("Location: dashboard.php");
        exit();  // Ensure no further code is executed
    } else {
        // Invalid password
        echo "<p style='color: red;'>Invalid password!</p>";
    }
} else {
    // Username not found
    echo "<p style='color: red;'>Username not found!</p>";
}

$stmt->close();
$conn->close();
?>
