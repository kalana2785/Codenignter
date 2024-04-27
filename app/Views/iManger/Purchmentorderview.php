<html>
<head>
    <title>Create Purchcement Order</title>
    <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
</head>
<body>
    <?= $this->include('Layout/header.php') ?>
    <?= $this->include('Layout/floter.php') ?>

    <main id="main" class="main">

        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error') ?>
            </div>
        <?php endif; ?>

        <div id="item-list" class="item-list-container">
            <ul class="list-group">
                <?php foreach ($dashboards as $row): ?>
                    <li class="list-group-item">
                        <label>
                            <input type="checkbox" name="item[]" value="<?= $row['id'] ?>">
                            <?= $row['item_name'] ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>
</body>
</html>
