<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
        }

        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333333;
            font-weight: 700;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
            font-weight: 500;
        }

        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .input-group button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 16px;
            font-weight: 500;
        }

        .input-group button[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .input-group a.button-link {
            display: block;
            margin-top: 10px;
            padding: 10px;
            text-align: center;
            background-color: #ff7043;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .input-group a.button-link:hover {
            background-color: #ff5722;
            transform: scale(1.05);
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
            font-weight: 500;
        }

        .floating-object {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: float 6s ease-in-out infinite;
            z-index: 1;
        }

        .object1 {
            width: 150px;
            height: 150px;
            top: 20%;
            left: 10%;
        }

        .object2 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            right: 10%;
        }

        .object3 {
            width: 120px;
            height: 120px;
            top: 50%;
            right: 25%;
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
        <h2>User Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <p class="error-message"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="<?= base_url('userlogin') ?>" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit">Login</button>
                <br><br>
                <a href="<?= base_url('register') ?>">New User? Register</a>
                <br><br>
                <a href="<?= base_url() ?>" class="button-link">Back to Main page</a>
            </div>
        </form>
    </div>
    <div class="floating-object object1"></div>
    <div class="floating-object object2"></div>
    <div class="floating-object object3"></div>
</body>
</html>
