<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #4CAF50, #2E8B57);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 90%;
            padding: 25px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .success-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #2E8B57;
        }

        .success-container p {
            font-size: 1rem;
            margin-bottom: 25px;
            color: #555;
            line-height: 1.5;
        }

        .success-container a {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(to right, #4CAF50, #2E8B57);
            color: white;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .success-container a:hover {
            background: linear-gradient(to right, #45a049, #1e6f47);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 500px) {
            .success-container {
                padding: 20px;
            }

            .success-container h1 {
                font-size: 1.5rem;
            }

            .success-container p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

    <div class="success-container">
        <h1>Payment Successful!</h1>
        <p>Your payment has been successfully processed. Thank you for your order.</p>
        <a href="index.php">Go to Home</a>
    </div>

</body>
</html>
