<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        .container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
        button { background-color: blue; color: white; border: none; cursor: pointer; }
        button:hover { background-color: darkblue; }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter OTP</h2>
    <p>We have sent an OTP to your email: <strong><?php session_start(); echo $_SESSION['email']; ?></strong></p>
    
    <form action="verify_otp.php" method="POST">
        <input type="text" name="otp" placeholder="Enter OTP" required><br>
        <button type="submit">Verify OTP</button>
    </form>
</div>

</body>
</html>
