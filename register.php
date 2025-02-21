<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .register-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .register-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        
        <form id="registerForm" action="register_process.php" method="POST">
        <input type="text" id="username" name="username" placeholder="Username" required><br>
        <input type="email" id="email" name="email" placeholder="Email" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <button type="button" onclick="sendOTP()">Send OTP</button>

    </form>

    <div id="otpSection" style="display: none;">
        <input type="text" id="otp" name="otp" placeholder="Enter OTP" required><br>
        <button type="button" onclick="verifyOTP()">Verify OTP & Register</button>
        <p id="otpMessage"></p>
    </div>    </div>
    <script>
        function sendOTP() {
            let email = document.getElementById("email").value;
            if (email === "") {
                alert("Please enter your email.");
                return;
            }

            fetch("send_otp.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `email=${email}`
            })
            .then(response => response.text())
            .then(data => {
                if (data === "OTP sent") {
                    document.getElementById("otpSection").style.display = "block";
                    alert("OTP has been sent to your email.");
                } else {
                    alert("Error sending OTP.");
                }
            });
        }

        function verifyOTP() {
            let username = document.getElementById("username").value;
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let otp = document.getElementById("otp").value;

            if (otp === "") {
                alert("Please enter OTP.");
                return;
            }

            fetch("verify_otp.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `username=${username}&email=${email}&password=${password}&otp=${otp}`
            })
            .then(response => response.text())
            .then(data => {
                if (data === "Registration successful") {
                    alert("User registered successfully!");
                    window.location.href = "login.php";
                } else {
                    document.getElementById("otpMessage").innerText = data;
                }
            });
        }
    </script>
</body>
</html>