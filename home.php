<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Delivery Service</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
        }

        h1, h2, h3, p {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        /* Hero Section */
        .hero {
            background-color: #004080;
            color: white;
            padding: 100px 20px;
            text-align: center;
            background-image: url('https://example.com/fuel-banner.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }

        .hero h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            font-weight: 300;
        }

        .cta-btn {
            background-color: #d32f2f;
            color: white;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .cta-btn:hover {
            background-color: #c2185b;
        }

        /* How It Works Section */
        .how-it-works {
            padding: 60px 20px;
            text-align: center;
            background-color: #f1f1f1;
            border-top: 2px solid #004080;
        }

        .how-it-works h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #004080;
        }

        .how-it-works .step {
            display: inline-block;
            width: 28%;
            margin: 0 10px;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .how-it-works .step img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }

        .how-it-works .step h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #004080;
        }

        .how-it-works .step p {
            font-size: 16px;
            color: #666;
        }

        .how-it-works .step:hover {
            transform: translateY(-10px);
        }

        /* Features Section */
        .features {
            padding: 60px 20px;
            text-align: center;
        }

        .features h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #004080;
        }

        .features .feature {
            display: inline-block;
            width: 28%;
            margin: 0 10px;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .features .feature h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #004080;
        }

        .features .feature p {
            font-size: 16px;
            color: #666;
        }

        .features .feature:hover {
            transform: translateY(-10px);
        }

        /* Special Offers Section */
        .offers {
            padding: 60px 20px;
            background-color: #f8f9fa;
            text-align: center;
        }

        .offers h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #004080;
        }

        .offers .offer {
            display: inline-block;
            width: 28%;
            margin: 0 10px;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .offers .offer h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #004080;
        }

        .offers .offer p {
            font-size: 16px;
            color: #666;
        }

        .offers .offer:hover {
            transform: translateY(-10px);
        }

        .offers .cta-btn {
            background-color: #004080;
            padding: 12px 30px;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .offers .cta-btn:hover {
            background-color: #003366;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 60px 20px;
            background-color: #e9ecef;
            text-align: center;
        }

        .testimonials h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #004080;
        }

        .testimonials .testimonial {
            display: inline-block;
            width: 40%;
            margin: 20px;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .testimonials .testimonial p {
            font-size: 16px;
            margin-bottom: 15px;
            color: #666;
        }

        .testimonials .testimonial cite {
            font-style: italic;
            font-weight: bold;
            color: #004080;
        }

        /* Footer Section */
        footer {
            padding: 20px 0;
            background-color: #004080;
            color: white;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 16px;
        }

        footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Fuel Delivery at Your Doorstep</h1>
        <p>Get fuel delivered directly to your home, anytime, anywhere</p>
        <a href="login.php" class="cta-btn">Order Now</a>
    </div>

    <!-- How It Works Section -->
    <div class="how-it-works">
        <h2>How It Works</h2>
        <div class="step">
            <img src="im.png" alt="Step 1">
            <h3>Choose Your Fuel</h3>
            <p>Select your preferred fuel type and quantity.</p>
        </div>
        <div class="step">
            <img src="https://example.com/step2-icon.png" alt="Step 2">
            <h3>Set Delivery Time</h3>
            <p>Choose a delivery slot that works for you.</p>
        </div>
        <div class="step">
            <img src="https://example.com/step3-icon.png" alt="Step 3">
            <h3>Pay Securely</h3>
            <p>Pay online with a variety of payment methods.</p>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features">
        <h2>Why Choose Us?</h2>
        <div class="feature">
            <h3>Fast Delivery</h3>
            <p>We deliver your fuel quickly, whenever you need it.</p>
        </div>
        <div class="feature">
            <h3>Affordable Pricing</h3>
            <p>Get the best value for your money with our competitive rates.</p>
        </div>
        <div class="feature">
            <h3>Quality Fuel</h3>
            <p>We provide only the highest quality fuel, sourced from trusted suppliers.</p>
        </div>
    </div>

    <!-- Special Offers Section -->
    <div class="offers">
        <h2>Special Offers</h2>
        <div class="offer">
            <h3>10% Off First Order</h3>
            <p>Save 10% on your first fuel delivery!</p>
            <a href="#offer1" class="cta-btn">Claim Offer</a>
        </div>
        <div class="offer">
            <h3>5% Off on Diesel</h3>
            <p>Enjoy 5% off all diesel deliveries this week.</p>
            <a href="#offer2" class="cta-btn">Claim Offer</a>
        </div>
        <div class="offer">
            <h3>Free Delivery</h3>
            <p>Get free delivery on orders over 100 liters.</p>
            <a href="#offer3" class="cta-btn">Claim Offer</a>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial">
            <p>"Fast and reliable service. I’ll definitely use them again!"</p>
            <cite>- John D.</cite>
        </div>
        <div class="testimonial">
            <p>"Great experience! Easy to order and delivered on time."</p>
            <cite>- Sarah L.</cite>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Fuel Delivery Service | <a href="#contact">Contact Us</a></p>
    </footer>

</body>
</html>
