<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blogs</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
            color: #333;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            position: relative;
        }

        h1::after {
            content: '';
            width: 80px;
            height: 4px;
            background-color: #007bff;
            display: block;
            margin: 20px auto 0 auto;
            border-radius: 2px;
        }

        .blog-container {
            border: 1px solid #dedede;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden; /* Prevent content overflow */
        }

        .blog-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            background-color: #f9f9f9;
        }

        .blog-image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-image:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .profile-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #007bff;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 0;
            padding-bottom: 8px;
            border-bottom: 2px solid #007bff;
        }

        .profile-info .bio {
            font-size: 16px;
            color: #666;
            margin-top: 8px;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .profile-info .about {
            font-size: 14px;
            color: #444;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .no-blogs {
            font-style: italic;
            color: #777;
            text-align: center;
            margin-top: 40px;
        }

        .btn {
            display: inline-block;
            padding: 14px 35px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 40px;
            display: block;
            width: 50%;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Heart Icon */
        .heart-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .heart-icon.active {
            color: red;
        }

        @media (min-width: 768px) {
            .blog-container {
                display: flex;
                align-items: flex-start;
                gap: 20px;
            }

            .blog-image {
                width: 300px;
                max-height: 300px;
            }

            .profile-header {
                flex-direction: row;
            }
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
                        <?php if (!empty($blog['photo_path'])) : ?>
                            <img src="data:<?= $blog['photo_mime_type'] ?>;base64,<?= base64_encode($blog['photo_path']) ?>" alt="<?= $blog['name'] ?>" class="blog-image">
                        <?php endif; ?>
                        <div class="profile-header">
                            <div class="profile-info">
                                <h2><?= $blog['name'] ?></h2>
                                <p class="bio"><?= $blog['bio'] ?></p>
                                <p class="about"><?= $blog['about'] ?></p>
                            </div>
                        </div>
                        <i class="heart-icon far fa-heart"></i>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="no-blogs">No blogs found.</p>
            <?php endif; ?>
        </div>
        <a href="<?= base_url('welcome') ?>" class="btn">Home</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.heart-icon').click(function () {
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
