<!-- Unit/dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>User Data</h1>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userData as $userList): ?>
                <?php foreach ($userList as $user): ?>
                    <tr>
                        <td><?= $user['Unit_id'] ?></td>
                        <td><?= $user['item_name'] ?></td>
                        <!-- Display more user data columns as needed -->
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
