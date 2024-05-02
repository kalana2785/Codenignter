<!-- Admin/Purchmentprint.php -->
<html>
<head>
    <title>Add Items</title>
    <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
    <link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
    <script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>
</head>
<body>
    <main id="main" class="main">
        <?php if (!empty($reqpu)): ?>
        <div class="container">
            <div class="row">
                <?php foreach ($reqpu as $row): ?>
                                        <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Purchase Details</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Item Name</th>
                                            <td><?php echo $row['item_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Avaliable Quntity</th>
                                            <td><?php echo $row['quntity']; ?></td>
                                        </tr>
                                        <!-- Add more rows for additional details -->
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>

                                 
                                <!-- Add more form fields as needed -->
                           
                   
                <?php endforeach; ?>

                <button type="submit" class="btn btn-success" name="approve">Approve</button>
                </form>
            </div>
        </div>
        <?php else: ?>
        <p>No data found for the provided ID.</p>
        <?php endif; ?>
    </main>
</body>
</html>
