<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 10;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }
        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .login-button, .back-button {
            flex: 1;
            padding: 15px;
            background-color: #ff7e5f;
            color: #ffffff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 16px;
            margin: 0 5px;
        }
        .login-button:hover, .back-button:hover {
            background-color: #feb47b;
            transform: scale(1.05);
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: #777777;
        }
        .floating-object {
            position: absolute;
            animation: float 6s ease-in-out infinite;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .object1 {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 15%;
        }
        .object2 {
            width: 80px;
            height: 80px;
            bottom: 20%;
            right: 20%;
        }
        .object3 {
            width: 60px;
            height: 60px;
            top: 50%;
            right: 35%;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <p class="error-message"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="<?= base_url('login') ?>" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="button-container">
                <button type="submit" class="login-button">Login</button>
                <a href="<?= base_url() ?>" class="back-button">Back to Main page</a>
            </div>
        </form>
    </div>
    <div class="floating-object object1"></div>
    <div class="floating-object object2"></div>
    <div class="floating-object object3"></div>
</body>
</html>
