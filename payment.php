<?php
session_start();

// Retrieve the amount from session or GET request
$amount = isset($_SESSION['amount']) ? $_SESSION['amount'] : (isset($_GET['amount']) ? $_GET['amount'] : 0);

// Generate QR Code for UPI Payment (Replace with your actual UPI ID)
$upiId = "7569720309@fam"; // Example: merchant@upi
$paymentUrl = "upi://pay?pa=$upiId&pn=FuelDelivery&mc=&tid=&tr=&tn=Fuel%20Payment&am=$amount&cu=INR";
$qrCodeUrl = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . urlencode($paymentUrl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Payment</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #0f0c29;
            background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: #fff;
        }

        .payment-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            text-transform: uppercase;
            color: #ffcc00;
        }

        p {
            font-size: 1.2rem;
            margin: 15px 0;
            font-weight: bold;
        }

        .qr-code {
            width: 220px;
            height: 220px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(255, 204, 0, 0.6);
            transition: transform 0.3s ease;
        }

        .qr-code:hover {
            transform: scale(1.1);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        select, button {
            width: 100%;
            max-width: 300px;
            padding: 12px;
            font-size: 1rem;
            border-radius: 8px;
            border: none;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        select {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            outline: none;
            text-align: center;
        }

        button {
            background: linear-gradient(90deg, #ffcc00, #ff9900);
            color: white;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255, 204, 0, 0.5);
        }

        button:hover {
            background: linear-gradient(90deg, #ff9900, #ffcc00);
            transform: scale(1.1);
            box-shadow: 0 5px 20px rgba(255, 204, 0, 0.7);
        }

        .footer {
            font-size: 0.9rem;
            margin-top: 20px;
        }

        .footer a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="payment-container">
        <h1>Fuel Payment</h1>
        <p>Amount to Pay: <strong>₹<?php echo $amount; ?></strong></p>

        <h3>Scan QR Code to Pay</h3>
        <img class="qr-code" src="qr1.png" alt="Scan QR Code to Pay">

        <form action="payment_success.php" method="POST">
            <input type="hidden" name="amount" value="<?php echo $amount; ?>">
            <label for="payment_method">Select Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="upi">UPI</option>
                <option value="credit_card">Credit Card</option>
                <option value="debit_card">Debit Card</option>
            </select>
            <button type="submit">Proceed with Payment</button>
        </form>

        <div class="footer">
            <p>Need help? <a href="contact.php">Contact Support</a></p>
        </div>
    </div>

</body>
</html>
