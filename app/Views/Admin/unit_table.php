<html>


<head>

 <title>Item Type Table</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
<link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

<script src="assets/js/main.js"></script>

<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>


<script src="<?= base_url('Assests/js1/jquery-3.7.1.js');?>" ></script>

<script src="<?= base_url('Assests/js1/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js1/popper.min.js');?>" ></script>
</head>


<body>

<?= $this->include('Layout/Admin/header.php') ?>




<?= $this->include('Layout/Admin/floter.php') ?>



<main id="main" class="main">
 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>
<?php if (session()->has('status')): ?>
    <div class="alert alert-success" role="alert">
        <?= session('status') ?>
    </div>
<?php endif; ?>
<div class="pagetitle">
      <h1>Unit Table</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">View Table</a></li>
          <li class="breadcrumb-item active">Unit</li>
          
        </ol>
      </nav>
</div>

<div id="table1" class="table-container active-table">
    <div class="redirect-button">
        <button onclick="window.location.href='<?= base_url('Admin/Add-unit');?>'" class="btn btn-primary">Add New Unit</button>
    </div>
    <table id="itemTable" class="table" name="">
        <thead>
           
            <tr>
                <th scope="col">Unit Table</th>
              
            </tr>
        </thead>
        <tbody>
            <?php if ($unit): ?>
                <?php foreach ($unit as $row) : ?>
                    <tr>
                        <td><?php echo $row['Unit_name']; ?></td>
                      
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No Unit available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script>
    $(document).ready(function() {
        $('#itemTable').DataTable();
    });
</script>


 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>






