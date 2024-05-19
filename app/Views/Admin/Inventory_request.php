<html>


<head>

 <title>Request Table-Inventory</title>
 <link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('Assests/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
 
    <link href="<?= base_url('Assests/css/style.css'); ?>" rel="stylesheet">


    <script src="assets/js/main.js"></script>
    <script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('Assests/js1/jquery-3.7.1.js'); ?>"></script>
    <script src="<?= base_url('Assests/js1/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('Assests/js1/popper.min.js'); ?>"></script>
</head>


<body>

<?= $this->include('Layout/Admin/header.php') ?>

<?= $this->include('Layout/Admin/floter.php') ?>



<main id="main" class="main">


<div class="pagetitle">
      <h1>Inventory Request</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Request Tables</a></li>
          <li class="breadcrumb-item active">Inventory Request</li>
          
        </ol>
      </nav>
</div>


<body>



 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>


<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
      
      <th scope="col">Items Name</th>
      <th scope="col">Batch N0</th>
      <th scope="col">Serial N0</th>
      
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php if ($Inventory): ?>
  <?php foreach ($Inventory as $row): ?>

              <tr>
              <td><?= $row['item_name'] ?></td>
              <td><?= $row['BN_number'] ?></td>
              <td><?= $row['Sn_number'] ?></td>
     
              <td>
                            <a href="<?php echo base_url('Admin/viewinventoryreq/' . $row['Inventory_id']); ?>" class="btn btn-primary btn-sm">Cheack</a>

                                



              </td>

              
             </tr>
          
<?php endforeach; ?>
<?php else: ?>
                <tr>
                    <td colspan="3">No Inventory Request available</td>
                </tr>
<?php endif; ?>
</tbody>
</table>
</div>

</main>
</body>
</html>         


