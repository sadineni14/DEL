<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Delivery Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1, h2 {
            text-align: center;
        }

        .services-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 40px 0;
        }

        .service {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 30%;
            margin: 10px;
            padding: 20px;
            text-align: center;
        }

        .service img {
            width: 60px;
            height: 60px;
            margin-bottom: 20px;
        }

        .service h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
        }

        .service p {
            font-size: 16px;
            color: #777;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .cta-btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .cta-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <header>
        <h1>Fuel Delivery Services</h1>
    </header>

    <section class="services-container">
        <!-- Emergency Fuel Delivery -->
        <div class="service">
            <img src="fuel-meter-311685_640.webp" alt="Emergency Fuel Delivery">
            <h3>Emergency Fuel Delivery</h3>
            <p>Running low on fuel? We’ll deliver emergency fuel directly to your location, anytime, anywhere.</p>
            <a href="login.php" class="cta-btn">Order Now</a>
        </div>

        <!-- Scheduled Deliveries -->
        <div class="service">
            <img src="https://via.placeholder.com/60" alt="Scheduled Deliveries">
            <h3>Scheduled Deliveries</h3>
            <p>Plan ahead with scheduled deliveries. Choose the time and location, and we’ll deliver fuel to you on time.</p>
            <a href="#schedule" class="cta-btn">Schedule Delivery</a>
        </div>

        <!-- Bulk Fuel Deliveries -->
        <div class="service">
            <img src="https://via.placeholder.com/60" alt="Bulk Fuel Deliveries">
            <h3>Bulk Fuel Deliveries</h3>
            <p>Get large quantities of fuel delivered to your business or construction site with our bulk fuel delivery service.</p>
            <a href="login.php" class="cta-btn">Get Bulk Fuel</a>
        </div>
    </section>

</body>
</html>
