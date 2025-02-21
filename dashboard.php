<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in by checking session variables
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; // Get the username from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* General Reset */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(6-1.jpg);
            background-size: 100%
        }

        .dashboard-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .dashboard-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        .order-button, .logout-button {
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s, box-shadow 0.3s;
            margin: 10px 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .order-button {
            background: linear-gradient(to right, #007BFF, #0056b3);
            color: white;
            border: none;
        }

        .order-button:hover {
            background: linear-gradient(to right, #0056b3, #004494);
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .logout-button {
            background: linear-gradient(to right, #dc3545, #a3001b);
            color: white;
            border: none;
        }

        .logout-button:hover {
            background: linear-gradient(to right, #c82333, #870019);
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Add subtle entrance animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <a href="fuel.php" class="order-button">Fuel</a>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

</body>
</html>
