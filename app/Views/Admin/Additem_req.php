<html>


<head>

 <title>Demand Table-Inventory</title>

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

<?= $this->include('Layout/Admin/header.php') ?>

<?= $this->include('Layout/Admin/floter.php') ?>



<main id="main" class="main">


<div class="pagetitle">
      <h1>Add Overstock Value </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Request Tables</a></li>
          <li class="breadcrumb-item active">Overstock Value Request</li>
          
        </ol>
      </nav>
</div>


<body>




<?php if (session()->has('status')): ?>
    <div class="alert alert-success" role="alert">

        <?= session('status') ?>
    </div>
<?php endif; ?>



<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
      
      <th scope="col">Items Name</th>
     
      
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php if ($Inventory): ?>
  <?php foreach ($Inventory as $row): ?>

              <tr>

              <form action="<?= base_url('Admin/adddemandform');?>" method="post">
              <td><?= $row['item_name'] ?></td>
              <td><input type="number" name="demandQ" placeholder="Overstock Quntity" ></td>
              <td><input type="number" name="id" value="<?= $row['id']; ?>"  hidden></td>

              <td>

                                
                            <input type="submit" class="btn btn-primary" value="Add">



              </td>
              </form>
              
             </tr>
          
<?php endforeach; ?>
<?php else: ?>
                <tr>
                    <td colspan="3">No Data available</td>
                </tr>
<?php endif; ?>
</tbody>
</table>
</div>

</main>
</body>
</html>         


