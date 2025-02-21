<?php
// Database connection settings
// Database connection settings
$servername = "localhost";
$username = "root";       // Default MySQL username for XAMPP
$password = "";           // Default password is empty
$dbname = "fuel_delivery_";  // Your database name, ensure this is correct
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // If there's a connection error, display it
}

echo "Connected successfully!";  // This will show if the connection is successful

$conn->close();  // Close the connection
?>
