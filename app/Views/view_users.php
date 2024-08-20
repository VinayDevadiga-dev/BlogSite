<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
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
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
            font-weight: 700;
        }

        .user {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f1f1f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .user:hover {
            background-color: #e0e0e0;
        }

        .user p {
            margin: 0;
            font-weight: 500;
            color: #555;
        }

        .btn {
            padding: 10px 15px;
            background-color: #f44336;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }

        .btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <?php $baseURL = base_url(); ?>
    <div class="container">
        <h1>View Users</h1>
        <?php foreach ($users as $user): ?>
            <div class="user">
                <p><?= esc($user['name']) ?></p>
                <!-- Delete User Form -->
                <form id="delete_form_<?= esc($user['id']) ?>" action="<?= $baseURL ?>/admin/deleteUser" method="post" style="margin: 0;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="user_id" value="<?= esc($user['id']) ?>">
                    <input type="hidden" id="confirm_delete_<?= esc($user['id']) ?>" name="confirm_delete" value="no">
                    <button type="button" class="btn" onclick="confirmDelete(<?= esc($user['id']) ?>)">Delete User</button>
                </form>
            </div>
        <?php endforeach; ?>
        <a href="<?= $baseURL ?>/admin" class="btn" style="display: block; text-align: center; margin-top: 20px;">Admin Home</a>
    </div>

    <script>
        function confirmDelete(user_id) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('confirm_delete_' + user_id).value = 'yes';
                document.getElementById('delete_form_' + user_id).submit();
            }
        }
    </script>
</body>
</html>
