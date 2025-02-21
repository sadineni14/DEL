<?php
// Database connection settings
$servername = "localhost";
$username = "root";       // Default MySQL username for XAMPP
$password = "";           // Default password is empty
$dbname = "fuel_delivery_";  // Your database name, ensure this is correct

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // If connection fails, show error
}

// Test data (adjust these variables to simulate a real form submission)
$username = "John Doe";   // You can change this to any name
$fuel_type = "Petrol";    // Example fuel type
$quantity = 15;           // Example quantity
$phone = "1234567890";    // Example phone number

// Insert query
$sql = "INSERT INTO orders (username, fuel_type, quantity, phone) 
        VALUES ('$username', '$fuel_type', '$quantity', '$phone')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;  // If there's an error, show it
}

$conn->close();  // Close the connection
?>
