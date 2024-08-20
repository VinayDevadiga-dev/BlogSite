<!-- app/Views/profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <div>
        <h2>Name: <?= $profile['name'] ?></h2>
        <img src="<?= base_url('path/to/photos/' . $profile['photo']) ?>" alt="Profile Photo">
        <p>About: <?= $profile['about'] ?></p>
    </div>
</body>
</html>
