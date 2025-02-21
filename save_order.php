<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $fuel_type = $_POST['fuel_type'];
    $quantity = $_POST['quantity'];
    $contact_number = $_POST['contact_number'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'fuel_delivery_');

    // Check connection
    if ($conn->connect_error) {
        die("<p style='color: red;'>Connection failed: " . $conn->connect_error . "</p>");
    }

    // Insert order data into the database
    $sql = "INSERT INTO orders (customer_name, address, fuel_type, quantity, contact_number) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssds', $customer_name, $address, $fuel_type, $quantity, $contact_number);

    if ($stmt->execute()) {
        // Successful order placement - redirect to payment page
        header("Location: payment.php");
        exit;  // Make sure no code is executed after the redirection
    } else {
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
