<html>


<head>

 <title>Request Table-Inventory</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
<link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">




<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>

<script src="<?= base_url('Assests/js1/jquery-3.7.1.js');?>" ></script>

<script src="<?= base_url('Assests/js1/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js1/popper.min.js');?>" ></script>
</head>


<body>




<main id="main" class="main">
 
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
</tbody>
</table>
</div>

</main>
</body>
</html>         

