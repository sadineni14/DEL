<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Neon Cyber UI</title>
    <style>
        /* Universal Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Animated Background */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at center, #000428, #004e92);
            overflow: hidden;
            animation: neonPulse 5s infinite alternate;
        }

        @keyframes neonPulse {
            0% { background: radial-gradient(circle at center, #000428, #004e92); }
            100% { background: radial-gradient(circle at center, #001F3F, #0066cc); }
        }

        /* Neon Glow Effect */
        .neon-text {
            color: #0ff;
            text-shadow: 0 0 10px #0ff, 0 0 20px #00ffff, 0 0 40px #00ffff;
        }

        /* Floating Login Box */
        .login-container {
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(0, 255, 255, 0.2);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            width: 360px;
            position: relative;
            backdrop-filter: blur(15px);
            animation: floatEffect 3s ease-in-out infinite;
        }

        @keyframes floatEffect {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Input Fields */
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 2px solid transparent;
            border-radius: 8px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: #0ff;
            text-align: center;
            transition: 0.3s;
        }

        .login-container input::placeholder {
            color: rgba(0, 255, 255, 0.5);
        }

        .login-container input:focus {
            border-color: #0ff;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
            outline: none;
        }

        /* Futuristic Buttons */
        .login-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #ff00ff, #00ffff);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .login-container button:hover {
            background: linear-gradient(to right, #00ffff, #ff00ff);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 255, 255, 0.4);
        }

        /* Links */
        .login-container a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #00ffff;
            font-size: 14px;
            transition: 0.3s;
        }

        .login-container a:hover {
            text-decoration: underline;
            color: #ff00ff;
        }

        /* Register Button */
        .login-container .register-button {
            display: block;
            font-weight: bold;
            padding: 12px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            transition: 0.3s;
        }

        .login-container .register-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Floating Particles */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background: #0ff;
            border-radius: 50%;
            opacity: 0.8;
            animation: particleAnimation 10s infinite linear;
        }

        @keyframes particleAnimation {
            from { transform: translateY(0); opacity: 0.8; }
            to { transform: translateY(-100vh); opacity: 0; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Floating Particles for Futuristic Feel -->
    <div class="particles">
        <script>
            for (let i = 0; i < 50; i++) {
                let particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + "vw";
                particle.style.top = Math.random() * 100 + "vh";
                particle.style.animationDuration = (Math.random() * 5 + 5) + "s";
                document.querySelector(".particles").appendChild(particle);
            }
        </script>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <h1 class="neon-text">Login</h1>
        <form action="login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="forgot_password.php">Forgot Password?</a>
        <a href="send_otp.php" class="register-button">New User? Register</a>
    </div>

</body>
</html>
