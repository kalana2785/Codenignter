<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Purchase Order</title>

    <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
    <script>
        function showTab(tabId) {
            // Hide all tab contents
            var tabContents = document.querySelectorAll('.tab-content > .tab-pane');
            tabContents.forEach(function(tabContent) {
                tabContent.classList.remove('active');
            });

            // Show the selected tab content
            document.getElementById(tabId).classList.add('active');
        }
    </script>
</head>
<body>

<main id="main" class="main container mt-5">

    <!-- Display error message if available -->
    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#surgicalTab" onclick="showTab('surgicalTab')">Surgical</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#generalTab" onclick="showTab('generalTab')">General</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Surgical items tab -->
        <div id="surgicalTab" class="tab-pane active">
            <br>
            <div id="surgicalItems" class="item-list-container">
                <!-- Surgical items will be loaded here -->
                <ul class="list-group">
                    <?php foreach ($sugicals as $row): ?>
                        <li class="list-group-item">
                            <label>
                                <input type="checkbox" name="item[]" value="<?= $row['id'] ?>">
                                <?= $row['item_name'] ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- General items tab -->
       <!-- General items tab -->
        <div id="generalTab" class="tab-pane">
            <br>
            <div id="generalItems" class="item-list-container">
                <!-- General items will be loaded here -->
                <ul class="list-group">
                    <?php foreach ($general as $row): ?>
                        <li class="list-group-item">
                            <label>
                                <input type="checkbox" name="item[]" value="<?= $row['id'] ?>">
                                <?= $row['item_name'] ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

</main>

<!-- Include Bootstrap JS at the bottom of the body -->
<script src="<?= base_url('Assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

</body>
</html>
