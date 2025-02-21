<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Step 1: Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Step 2: Validate if passwords match
    if ($password !== $confirm_password) {
        echo "<div class='message error'>Passwords do not match. Please try again.</div>";
        exit();
    }

    // Step 3: Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Step 4: Create a database connection
    $conn = new mysqli("localhost", "root", "", "fuel_delivery_"); // Line 19
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 5: Check if username already exists
    $sql_check_username = "SELECT id FROM users WHERE username = ?";
    $stmt_check_username = $conn->prepare($sql_check_username);
    $stmt_check_username->bind_param('s', $username);
    $stmt_check_username->execute();
    $stmt_check_username->store_result();

    if ($stmt_check_username->num_rows > 0) {
        echo "<div class='message error'>Username already taken. Please choose a different username.</div>";
        $stmt_check_username->close();
        $conn->close();
        exit();
    }

    // Step 6: Check if email already exists
    $sql_check_email = "SELECT id FROM users WHERE email = ?";
    $stmt_check_email = $conn->prepare($sql_check_email);
    $stmt_check_email->bind_param('s', $email);
    $stmt_check_email->execute();
    $stmt_check_email->store_result();

    if ($stmt_check_email->num_rows > 0) {
        echo "<div class='message error'>Email already registered. Please use a different email.</div>";
        $stmt_check_email->close();
        $conn->close();
        exit();
    }

    // Step 7: Prepare SQL query to insert the user into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    // Step 8: Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $hashed_password);

    // Step 9: Execute the query and check if the insertion was successful
    if ($stmt->execute()) {
        echo "<div class='message success'>Registration successful! <a href='login.php'>Login now</a></div>";
    } else {
        echo "<div class='message error'>Error: " . $stmt->error . "</div>";
    }

    // Step 10: Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .message {
            text-align: center;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
   
</body>
</html>
