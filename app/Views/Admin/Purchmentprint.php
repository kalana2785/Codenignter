<!-- Admin/Purchmentprint.php -->
<?php if (!empty($reqpu)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Item ID</th>
                <th>Purchase ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reqpu as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['item_id']; ?></td>
                    <td><?php echo $row['purchase_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No data found for the provided ID.</p>
<?php endif; ?>

