<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update My Blogs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333333;
        }
        .blog-card {
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .blog-form input,
        .blog-form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }
        .buttons-container {
            display: flex;
            gap: 10px;
            justify-content: flex-start;
            align-items: center;
            margin-top: 10px;
        }
        .blog-form button {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .blog-form button:hover {
            background-color: #45a049;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
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
        .btn-back {
            background-color: #007bff;
            margin-left: auto;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4caf50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            text-align: center;
            width: 80%;
            max-width: 400px; /* Set a max-width for larger screens */
        }
        .modal.show {
            display: block;
        }
        .modal button {
            background-color: #ffffff;
            color: #4caf50;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .modal button:hover {
            background-color: #f0f0f0;
        }
        /* Responsive adjustments */
        @media (max-width: 600px) {
            .modal {
                width: 90%;
                max-width: 300px; /* Adjust max-width for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update My Blogs</h1>
        <?php if (!empty($blogs)) : ?>
            <?php foreach ($blogs as $blog) : ?>
                <div class="blog-card">
                    <h2>Blog</h2>
                    <form class="blog-form" action="<?= base_url('update_blog/'.$blog['id']) ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                        <label for="name">Blog Name:</label>
                        <input type="text" name="name" value="<?= $blog['name'] ?>" required>
                        <label for="bio">Bio:</label>
                        <textarea name="bio" required><?= $blog['bio'] ?></textarea>
                        <label for="about">About:</label>
                        <textarea name="about" required><?= $blog['about'] ?></textarea>
                        <label for="photo">Photo:</label>
                        <?php if (!empty($blog['photo_path'])) : ?>
                            <img src="data:<?= $blog['photo_mime_type'] ?>;base64,<?= base64_encode($blog['photo_path']) ?>" alt="<?= $blog['name'] ?>" width="100">
                        <?php endif; ?>
                        <input type="file" name="photo">
                        <div class="buttons-container">
                            <button type="submit">Update Blog</button>
                            <form action="<?= base_url('delete_blog/'.$blog['id']) ?>" method="post">
                                <button class="btn" type="submit" onclick="return confirm('Are you sure you want to delete this blog?')">Delete Blog</button>
                            </form>
                            <a href="<?= base_url('welcome') ?>" class="btn btn-back">Go Back</a>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No blogs found.</p>
        <?php endif; ?>
    </div>

    <!-- Modal Popup -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="modal" id="modal-message">
            <?= session()->getFlashdata('success') ?>
            <button id="close-modal">Close</button>
        </div>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('modal-message');
            var closeModalButton = document.getElementById('close-modal');

            if (modal) {
                modal.classList.add('show');
                setTimeout(function() {
                    modal.classList.remove('show');
                }, 3000); // Hide the modal after 3 seconds

                closeModalButton.addEventListener('click', function() {
                    modal.classList.remove('show');
                });
            }
        });
    </script>
</body>
</html>
