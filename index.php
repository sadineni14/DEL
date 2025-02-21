<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Delivery</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        header {
            background-color: #006EB3;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .logo img {
            height: 50px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
        }
        nav ul li {
            display: inline-block;
        }
        nav ul li a {
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 20px;
            background: white;
            color: #006EB3;
            border-radius: 25px;
            border: 2px solid #006EB3;
            transition: all 0.3s ease-in-out;
            display: inline-block;
        }
        nav ul li a:hover {
            background: #006EB3;
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .img-container {
            position: relative;
            width: 100%;
            height: auto;
        }
        .image2 {
            width: 100%;
            height: auto;
            display: block;
        }
        .fuel-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(45deg, #006EB3, #00C9FF);
            padding: 15px 40px;
            font-size: 20px;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            left: 300px;    
        }
        .fuel-button:hover {
            background: linear-gradient(45deg, #00C9FF, #006EB3);
            transform: translate(-50%, -50%) scale(1.1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .fuel-button a {
            text-decoration: none;
            color: white;
            
        }
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            nav ul {
                flex-direction: column;
                gap: 10px;
            }
            .fuel-button {
                font-size: 16px;
                padding: 12px 30px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="logo-12.png" alt="Fuel">
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="special_offers.html">Special Offers</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="img-container">
        <img src="6-1.jpg" alt="fuel" class="image2">
        <button class="fuel-button">
            <a href="login.php">Fuel Up Now</a>
        </button>
    </div>
</body>
</html>
