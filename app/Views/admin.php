<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .container {
            max-width: 600px;
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
        h1 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn {
            display: block;
            width: 90%;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        .floating-object {
            position: absolute;
            animation: float 6s ease-in-out infinite;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .object1 {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 15%;
        }
        .object2 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            right: 20%;
        }
        .object3 {
            width: 80px;
            height: 80px;
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
    <div class="container">
        <h1>Welcome, Admin</h1>
        <a href="<?= base_url('view_blogs_admin') ?>" class="btn">View Every Blog</a>
        <a href="<?= base_url('view_users') ?>" class="btn">View List of Users</a>
        <br>
        <a href="<?= base_url('adminLogout') ?>" class="btn">Logout!</a>

    </div>
    <div class="floating-object object1"></div>
    <div class="floating-object object2"></div>
    <div class="floating-object object3"></div>
</body>
</html>
