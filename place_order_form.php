<?php
// Enable error reporting for debugging (uncomment during development)
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $fuel_type = $_POST['fuel_type'];
    $quantity = $_POST['quantity'];
    $contact_number = $_POST['contact_number'];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fuel_delivery";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<p style='color: red;'>Connection failed: " . $conn->connect_error . "</p>");
    }

    // Insert order data into the database
    $sql = "INSERT INTO orders (customer_name, address, fuel_type, quantity, contact_number) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param('sssds', $customer_name, $address, $fuel_type, $quantity, $contact_number);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to avoid duplicate submissions
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=true");
            exit();
        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p style='color: red;'>Error preparing the statement: " . $conn->error . "</p>";
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .order-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .order-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .order-container input,
        .order-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .order-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .order-container button:hover {
            background-color: #0056b3;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="order-container">
        <h1>Place an Order</h1>
        <?php
        // Show success message if redirected after successful submission
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo "<p class='success-message'>Order placed successfully!</p>";
        }
        ?>
        <form action="" method="POST">
            <input type="text" name="customer_name" placeholder="Customer Name" required>
            <input type="text" name="address" placeholder="Address" required>
            <select name="fuel_type" required>
                <option value="">Select Fuel Type</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="Gas">Gas</option>
                <option value="Electric">Electric</option>
            </select>
            <input type="number" step="0.01" name="quantity" placeholder="Quantity (Liters)" required>
            <input type="text" name="contact_number" placeholder="Contact Number" required>
            <button type="submit">Place Order</button>
        </form>
    </div>
</body>
</html>
