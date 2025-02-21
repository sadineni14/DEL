<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style>
        /* General Reset */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0052D4, #4364F7, #6FB1FC);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #ffffff;
        }

        /* Contact Container with Glassmorphism */
        .contact-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 400px;
            max-width: 90%;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .contact-container h1 {
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Contact Items */
        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px 0;
            padding: 12px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease-in-out;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .contact-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .contact-item ion-icon {
            font-size: 30px;
            color: #ffffff;
            margin-right: 15px;
            transition: transform 0.3s;
        }

        .contact-item:hover ion-icon {
            transform: scale(1.2);
        }

        .contact-item a {
            text-decoration: none;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .contact-item a:hover {
            color: #FFD700;
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.8);
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .contact-container {
                width: 90%;
                padding: 20px;
            }

            .contact-container h1 {
                font-size: 24px;
            }

            .contact-item ion-icon {
                font-size: 26px;
            }

            .contact-item a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <div class="contact-item">
            <ion-icon name="call-outline"></ion-icon>
            <a href="tel:+1234567890">+123 456 7890</a>
        </div>
        <div class="contact-item">
            <ion-icon name="call-outline"></ion-icon>
            <a href="tel:+0987654321">+098 765 4321</a>
        </div>
        <div class="contact-item">
            <ion-icon name="mail-outline"></ion-icon>
            <a href="mailto:info@fuelcompany.com">info@fuelcompany.com</a>
        </div>
    </div>
</body>
</html>
