<!-- app/Views/profiles.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Profiles</title>
</head>
<body>
    <h1>All Profiles</h1>
    <?php if (!empty($profiles)): ?>
        <ul>
            <?php foreach ($profiles as $profile): ?>
                <li>
                    <h2>Name: <?= $profile['name'] ?></h2>
                    <img src="<?= base_url('path/to/photos/' . $profile['photo']) ?>" alt="Profile Photo">
                    <p>About: <?= $profile['about'] ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No profiles found.</p>
    <?php endif; ?>
</body>
</html>
