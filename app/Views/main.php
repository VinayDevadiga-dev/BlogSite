<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px 20px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 10;
            width: 90%;
            max-width: 400px;
        }
        h1 {
            color: #333333;
            margin-bottom: 30px;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn {
            display: inline-block;
            width: 100%;
            max-width: 250px;
            padding: 12px;
            margin: 10px 0;
            background-color: #ff7e5f;
            color: #ffffff;
            border: none;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #feb47b;
            transform: scale(1.05);
        }
        .message {
            margin-top: 20px;
            font-size: 16px;
            color: #333333;
        }
        .message a {
            color: #ff7e5f;
            text-decoration: none;
            font-weight: bold;
        }
        .message a:hover {
            text-decoration: underline;
        }
        .floating-object {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            animation: float 6s ease-in-out infinite;
        }
        .object1 {
            width: 60px;
            height: 60px;
            top: 10%;
            left: 10%;
        }
        .object2 {
            width: 90px;
            height: 90px;
            bottom: 15%;
            right: 10%;
        }
        .object3 {
            width: 45px;
            height: 45px;
            top: 50%;
            right: 30%;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* Responsive design */
        @media (min-width: 600px) {
            .container {
                padding: 50px;
            }
            h1 {
                font-size: 36px;
                margin-bottom: 40px;
            }
            .btn {
                font-size: 16px;
                max-width: 200px;
            }
            .object1 {
                width: 100px;
                height: 100px;
            }
            .object2 {
                width: 150px;
                height: 150px;
            }
            .object3 {
                width: 75px;
                height: 75px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Blog System</h1>
        <a href="<?= base_url('userlogin') ?>" class="btn">User Login</a>
        <div class="message">
            <p>Are you an admin? <a href="<?= base_url('login') ?>">Admin Login</a></p>
        </div>
    </div>
    <div class="floating-object object1"></div>
    <div class="floating-object object2"></div>
    <div class="floating-object object3"></div>
</body>
</html>
