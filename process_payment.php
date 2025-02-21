<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the payment method from the form
    $payment_method = $_POST['payment_method'];

    // Check if order_id is stored in the session
    if (isset($_SESSION['order_id'])) {
        $order_id = $_SESSION['order_id']; // Get the order ID from session
    } else {
        // If no order_id is found, redirect to home
        header("Location: home.php");
        exit();
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'fuel_delivery_');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the order's payment status in the database
    $sql = "UPDATE orders SET payment_method = ?, payment_status = 'Completed' WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $payment_method, $order_id);  // s for string, i for integer

    if ($stmt->execute()) {
        // If payment is processed successfully, update the payment status and redirect to success page
        $_SESSION['payment_status'] = 'Completed'; // Store the payment status in session
        header("Location: payment_success.php");  // Redirect to the payment success page
        exit();
    } else {
        // If there is an error processing the payment, display an error message
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form isn't submitted, redirect to the home page
    header("Location: home.php");
    exit();
}
?>
