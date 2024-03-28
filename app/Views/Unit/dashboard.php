<!-- Views/Unit/dashboard.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Dashboard</title>
</head>
<body>
    <h1>Unit Dashboard</h1>

    <div>
        <h2>Unit Items</h2>
        <ul>
            <?php foreach ($unitItems as $item): ?>
                <li><?php echo $item['name']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Other dashboard content goes here -->

</body>
</html>
