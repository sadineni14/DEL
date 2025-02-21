<?php
// co1.php - Database connection file

// Database connection settings
$servername = "localhost";
$username = "root";       // Default MySQL username for XAMPP
$password = "";           // Default password is empty
$dbname = "fuel_delivery_";  // Your database name, ensure this is correct
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
