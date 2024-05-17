<html>


<head>

 <title>Request Table-Distribution</title>
 <link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<script src="assets/js/main.js"></script>
<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>
<script src="<?= base_url('Assests/js1/jquery-3.7.1.js');?>" ></script>
<script src="<?= base_url('Assests/js1/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js1/popper.min.js');?>" ></script>
</head>


<body>

<?= $this->include('Layout/header.php') ?>
<?= $this->include('Layout/floter.php') ?>




<main id="main" class="main">
<div class="pagetitle">
      <h1>Inventory Request Table </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Tables</a></li>
          <li class="breadcrumb-item active">Inventory Request Table</li>
          
        </ol>
      </nav>
</div>
 
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
      <th scope="col">BN Number</th>
      <th scope="col">Request  Quantity</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dashboards as $dashboard): ?>
        <tr>
            <td><?= $dashboard['item_name'] ?></td>
            <td><?= $dashboard['BN_number'] ?></td>
            <td><?= $dashboard['In_quntity'] ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>

</table>
</div>

</main>
</body>
</html>         


