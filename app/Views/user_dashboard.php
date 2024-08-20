<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        .btn {
            display: block;
            width: 90%;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn1 {
            display: block;
            width: 90%;
            padding: 15px;
            margin-bottom: 10px;
            background-color: crimson;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .user-info {
            text-align: right;
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
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
            width: 80px;
            height: 80px;
            top: 10%;
            left: 15%;
        }

        .object2 {
            width: 60px;
            height: 60px;
            bottom: 20%;
            right: 20%;
        }

        .object3 {
            width: 40px;
            height: 40px;
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
    <script type="text/javascript">
    (function (global) {
        if (typeof (global) === "undefined") {
            throw new Error("window is undefined");
        }

        var _hash = "!";
        var noBackPlease = function () {
            global.location.href += "#";

            // Making sure we have the fruitcake once again
            global.setTimeout(function () {
                global.location.href += "!";
            }, 50);
        };

        // At the end of the hash change, redirect back to the current page
        global.onhashchange = function () {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
                // Optionally, you can refresh the page here
                // location.reload(); 
            }
        };

        global.onload = function () {
            noBackPlease();

            // Disables backspace on page except on input fields and textarea..
            document.body.onkeydown = function (e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                    e.preventDefault();
                }
                // Stopping the event bubbling up the DOM tree...
                e.stopPropagation();
            };
        };
    })(window);
</script>

</head>
<body>
    <div class="container">
        <!-- <div class="user-info">
            Logged in as: <?= session()->get('user') ?> (ID: <?= session()->get('user_id') ?>)
        </div> -->
        <h1>Welcome to <?= session()->get('user') ?></h1>
        <a href="<?= base_url('create_blog') ?>" class="btn">Create a Blog</a>
        <a href="<?= base_url('update_blog') ?>" class="btn">Update My Blog</a>
        <a href="<?= base_url('view_blogs') ?>" class="btn">View Every Blog</a>
        <br>
        <a href="<?= base_url('logout') ?>" class="btn1">Logout!</a>

    </div>
    <div class="floating-object object1"></div>
    <div class="floating-object object2"></div>
    <div class="floating-object object3"></div>
</body>
</html>
