<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
        }

        .register-container h2 {
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

        .input-group button[type="submit"],
        .input-group a {
            width: 95%;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 16px;
            font-weight: 500;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
        }

        .input-group button[type="submit"]:hover,
        .input-group a:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
            font-weight: 500;
        }

        .success-message {
            color: green;
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

        .button-primary {
            width: 100%;
            border-radius: 5px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            padding: 15px 20px; /* Adjust the padding for width and height */
        }

        .button-primary:hover {
            background-color: #45a049;
            transform: scale(1.05);
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
    <div class="register-container">
        <h2>Register</h2>
        <?php if (session()->getFlashdata('success')): ?>
            <p class="success-message"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>
        <?php if (isset($validation)): ?>
            <div class="error-message">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('register') ?>" method="POST">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="button-primary"><b>Register</b></button>
        </form>
        <br>
        <div class="input-group">
            <a href="<?= base_url('userlogin') ?>">Back to Login</a>
        </div>
    </div>
    <div class="floating-object object1"></div>
    <div class="floating-object object2"></div>
    <div class="floating-object object3"></div>
</body>
</html>
