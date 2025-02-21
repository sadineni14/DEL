<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Prices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            text-align: center;
            background-image: url(pt2.jpg);
            background-size: 120%;
        }
        h1 {
            color: orange;
            font-size: 28px;
            margin-top: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }

        .item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
            position: relative;
        }

        .logo {
            width: 100px;
            height: 100px;
            border: 2px solid black;
            padding: 5px;
            object-fit: contain;
            background: white;
            border-radius: 8px;
        }

        .fuel-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .fuel-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: green;
            margin: 3px 0;
        }

        .label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        /* Cart Button */
        .cart-btn {
            margin-top: 10px;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .cart-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <h1>Fuel Prices</h1>

    <div class="container">
        <!-- HP Fuel -->
        <div class="item">
            <img class="logo" src="hp.jpg" alt="HP Fuel">
            <div class="fuel-info">
                <span class="fuel-name">HP Fuel Station</span>
                <span class="label">Petrol:</span> <span class="price">₹105.50/L</span>
                <span class="label">Diesel:</span> <span class="price">₹94.80/L</span>
                <span class="label">Gas:</span> <span class="price">₹67.90/kg</span>
                <button class="cart-btn" onclick="addToCart('HP Fuel', 'Petrol', 105.50)">🛒 Add to Cart</button>
            </div>
        </div>

        <!-- Bharat Petroleum -->
        <div class="item">
            <img class="logo" src="bharath.png" alt="Bharath Fuel">
            <div class="fuel-info">
                <span class="fuel-name">Bharath Petroleum</span>
                <span class="label">Petrol:</span> <span class="price">₹106.20/L</span>
                <span class="label">Diesel:</span> <span class="price">₹95.30/L</span>
                <span class="label">Gas:</span> <span class="price">₹68.40/kg</span>
                <button class="cart-btn" onclick="addToCart('Bharath Petroleum', 'Diesel', 95.30)">🛒 Add to Cart</button>
            </div>
        </div>

        <!-- Indian Oil -->
        <div class="item">
            <img class="logo" src="ind.jpg" alt="Indian Fuel">
            <div class="fuel-info">
                <span class="fuel-name">Indian Oil</span>
                <span class="label">Petrol:</span> <span class="price">₹107.10/L</span>
                <span class="label">Diesel:</span> <span class="price">₹96.00/L</span>
                <span class="label">Gas:</span> <span class="price">₹69.00/kg</span>
                <button class="cart-btn" onclick="addToCart('Indian Oil', 'Gas', 69.00)">🛒 Add to Cart</button>
            </div>
        </div>

        <!-- Jio BP -->
        <div class="item">
            <img class="logo" src="jio1.png" alt="Jio Fuel">
            <div class="fuel-info">
                <span class="fuel-name">Jio BP</span>
                <span class="label">Petrol:</span> <span class="price">₹104.80/L</span>
                <span class="label">Diesel:</span> <span class="price">₹94.50/L</span>
                <span class="label">Gas:</span> <span class="price">₹67.50/kg</span>
                <button class="cart-btn" onclick="addToCart('Jio BP', 'Petrol', 104.80)">🛒 Add to Cart</button>
            </div>
        </div>
    </div>

    <script>
        function addToCart(station, fuelType, price) {
            // Redirect to order.php with fuel details
            window.location.href = `order.php?station=${station}&fuelType=${fuelType}&price=${price}`;
        }
    </script>

</body>
</html>
