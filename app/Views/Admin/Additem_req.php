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
<?php if (session()->has('status')): ?>
    <div class="alert alert-success" role="alert">

        <?= session('status') ?>
    </div>
<?php endif; ?>



<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
      
      <th scope="col">Request Items Name</th>
    
      
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($Inventory as $row): ?>

              <tr>

              <form action="<?= base_url('Admin/adddemandform');?>" method="post">
              <td><?= $row['item_name'] ?></td>
              <td><input type="number" name="demandQ" placeholder="Add demand Quntity" ></td>
              <td><input type="number" name="id" value="<?= $row['id']; ?>"  hidden></td>

              <td>

                                
                            <input type="submit" class="btn btn-primary" value="Add demand Quntity">



              </td>
              </form>
              
             </tr>
          
<?php endforeach; ?>
</tbody>
</table>
</div>

</main>
</body>
</html>         


