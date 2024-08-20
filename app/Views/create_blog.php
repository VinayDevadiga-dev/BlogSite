<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            height: 80vh;
            position: relative;
        }
        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333333;
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #555555;
        }
        textarea {
            resize: vertical;
        }
        button[type="submit"] {
            display: block;
            width: calc(100% - 22px);
            padding: 12px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .btn {
            display: inline-block;
            padding: 10px;
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #e60000;
        }
        .floating-bubble {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 0, 0, 0.3);
            width: 80px;
            height: 80px;
            z-index: -1;
            animation: floatBubble 5s ease-in-out infinite;
        }
        .bubble-left {
            left: -40px;
            top: 50%;
            transform: translateY(-50%);
        }
        .bubble-right {
            right: -40px;
            top: 50%;
            transform: translateY(-50%);
        }
        @keyframes floatBubble {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
        .back-button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            margin-top: 10px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Create a Blog</h1>

        <!-- Display Success or Error Message as Popup -->
        <?php if (session()->getFlashdata('success')): ?>
            <script>
                alert("<?= session()->getFlashdata('success') ?>");
            </script>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <script>
                alert("<?= session()->getFlashdata('error') ?>");
            </script>
        <?php endif; ?>

        <form action="<?= base_url('save_blog') ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" rows="4" maxlength="300" required></textarea>
            </div>
            <div>
                <label for="about">About:</label>
                <textarea id="about" name="about" rows="4" maxlength="400" required></textarea>
            </div>
            <div>
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>
            <button type="submit">Save Blog</button>
        </form>

        <!-- Back Button -->
        <a href="/ciminiblog/welcome#!" class="back-button">Back</a>
    </div>

</body>
</html>
