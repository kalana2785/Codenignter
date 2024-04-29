<html>
<head>
    <title>Add Items</title>
    <link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
</head>
<body>
    <main id="main" class="main">
        <!-- Check if there is an error message and display it -->
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error') ?>
            </div>
        <?php endif; ?>

        <div id="table1" class="table-container active-table">
            <table class="table" name="All">
                <thead>
                    <tr>
                        <th scope="col">Purchase ID</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $purchaseId => $row): ?>
                        <tr>
                            <td><?= $purchaseId; ?></td>
                            <!-- Display other columns related to each purchase ID -->
                        </tr>
                    <?php endforeach; ?>
               </tbody>
            </table>
        </div>
    </main>
</body>
</html>
