<?php
// Start session
session_start();
include('co1.php'); // Include database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if database connection is established
if (!$conn) {
    die("❌ Database connection failed: " . mysqli_connect_error());
}

// Debugging: Confirm database connection
echo "!<br>";

// Fuel prices (modify as needed)
$fuel_prices = [
    'Petrol' => 105.50,
    'Diesel' => 94.80,
    'Gas' => 67.90
];

// Get station name from URL (sent from cart)
$fuel_station = $_GET['station'] ?? '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST); // Debugging: Show form data
    echo "</pre>";

    // Expected fields
    $expected_fields = ['username', 'fuel_station', 'fuel_type', 'quantity', 'phone', 'address', 'payment_method'];
    $missing_fields = [];

    foreach ($expected_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }

    if (!empty($missing_fields)) {
        die("❌ Error: Missing fields: " . implode(', ', $missing_fields));
    }

    // Retrieve and sanitize form data
    $customer_name = trim($_POST['username']);
    $fuel_station = trim($_POST['fuel_station']);
    $fuel_type = trim($_POST['fuel_type']);
    $quantity = (int) $_POST['quantity'];
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $payment_method = trim($_POST['payment_method']);
    $price_per_liter = $fuel_prices[$fuel_type] ?? 0;
    $total_price = $price_per_liter * $quantity;

    // Validate phone number format (10 digits)
    if (!preg_match('/^\d{10}$/', $phone)) {
        die("❌ Error: Invalid phone number format.");
    }

    // Validate quantity (must be > 0)
    if ($quantity <= 0) {
        die("❌ Error: Quantity must be greater than zero.");
    }

    // Debugging: Confirm values before inserting into DB
    echo "✅ Form validated. Proceeding with database insertion...<br>";

    // Prepare SQL statement for insertion
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, fuel_station, fuel_type, quantity, contact_number, address, payment_method, total_price, order_status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");

    if (!$stmt) {
        die("❌ Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssisssd", $customer_name, $fuel_station, $fuel_type, $quantity, $phone, $address, $payment_method, $total_price);

    // Execute SQL statement
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;
        $stmt->close();
        $conn->close(); // Close database connection

        // Debugging: Confirm order ID
        echo "✅ Order successfully inserted with Order ID: $order_id <br>";

        // Redirect to payment page after 3 seconds
        echo "Redirecting to payment page...";
        header("Refresh: 3; URL=payment.php?order_id=$order_id&fuel_type=$fuel_type&quantity=$quantity&total_price=$total_price");
        exit();
    } else {
        die("❌ Error inserting data: " . $stmt->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Your Order</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #000428, #004e92);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        /* Order Form Container */
        .order-container {
            background: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 450px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Heading */
        .order-container h1 {
            color: #ffcc00;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Labels */
        label {
            font-weight: bold;
            display: block;
            text-align: left;
            margin-bottom: 8px;
            color: #fff;
        }

        /* Input Fields */
        input[type="text"],
        input[type="number"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            box-sizing: border-box;
        }

        /* Total Price */
        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00ff99;
            margin-bottom: 15px;
        }

        /* Submit Button */
        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, #ffcc00, #ff5733);
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button[type="submit"]:hover {
            background: linear-gradient(to right, #ff4500, #ffcc00);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
<div class="order-container">
        <h1>Place Your Order</h1>
        <form action="order.php" method="POST" oninput="calculateTotal()">
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" placeholder="Enter your name" required>

            <label for="fuel_station">Fuel Station:</label>
            <input type="text" id="fuel_station" name="fuel_station" value="<?php echo htmlspecialchars($fuel_station); ?>" readonly>

            <label for="fuel_type">Fuel Type:</label>
            <select id="fuel_type" name="fuel_type" required onchange="updatePrice()">
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="Gas">Gas</option>
            </select>

            <label for="price_per_liter">Price per Liter (₹):</label>
            <input type="text" id="price_per_liter" name="price_per_liter" value="<?php echo $fuel_prices['Petrol']; ?>" readonly>

            <label for="quantity">Quantity (Liters):</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>

            <p class="total-price">Total Price: ₹<span id="total_price_display">0</span></p>
            <input type="hidden" id="total_price" name="total_price">

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="\d{10}" placeholder="Enter your phone number" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>
            <label for="payment_method">Payment Method:</label>
<select id="payment_method" name="payment_method" required>
    <option value="">Select Payment Method</option>
    <option value="Credit Card">Credit Card</option>
    <option value="Debit Card">Debit Card</option>
    <option value="Cash on Delivery">Cash on Delivery</option>
</select>

            <button type="submit">Place Order</button>
        </form>
    </div>

    <script>
        const fuelPrices = <?php echo json_encode($fuel_prices); ?>;

        function updatePrice() {
            let fuelType = document.getElementById("fuel_type").value;
            document.getElementById("price_per_liter").value = fuelPrices[fuelType];
            calculateTotal();
        }

        function calculateTotal() {
            let price = parseFloat(document.getElementById("price_per_liter").value);
            let quantity = parseFloat(document.getElementById("quantity").value);
            let total = price * quantity || 0;
            document.getElementById("total_price_display").innerText = total.toFixed(2);
            document.getElementById("total_price").value = total.toFixed(2);
        }
    </script>

</body>
</html>
