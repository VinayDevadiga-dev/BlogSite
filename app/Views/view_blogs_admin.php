<!-- app/Views/view_blogs_admin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blogs</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@600&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #FF7E5F, #FEB47B);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .blog-container {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .bio {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .about {
            font-size: 16px;
            color: #555;
        }
        .no-blogs {
            font-style: italic;
            color: #999;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 16px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #45A049;
            transform: scale(1.05);
        }
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px;
            background-color: #FF0000;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 14px;
        }
        .delete-btn:hover {
            background-color: #CC0000;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Blogs</h1>
        <div>
            <?php if (!empty($blogs)) : ?>
                <?php foreach ($blogs as $blog) : ?>
                    <div class="blog-container">
                        <h3><?= $blog['name'] ?></h3>
                        <p class="bio"><?= $blog['bio'] ?></p>
                        <?php if (!empty($blog['photo_path'])) : ?>
                            <img src="data:<?= $blog['photo_mime_type'] ?>;base64,<?= base64_encode($blog['photo_path']) ?>" alt="<?= $blog['name'] ?>" class="blog-image">
                        <?php endif; ?>
                        <p class="about"><?= $blog['about'] ?></p>
                        <!-- Delete Form -->
                        <form action="<?= base_url('admin/delete_blog/' . $blog['id']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="no-blogs">No blogs found.</p>
            <?php endif; ?>
        </div>
        <a href="<?= base_url('admin') ?>" class="btn">Admin Home</a>
    </div>
</body>
</html>
