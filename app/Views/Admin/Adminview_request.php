<html>


<head>

 <title>Add Items</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">

</head>


<body>



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


<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Items Name</th>
       <th>Unit Name</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($requests):?>
        <?php foreach($requests as $row) : ?>
            <tr>
                <td><?php echo $row['req_no']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['Unit_name']; ?></td>
                <td>
                      <a href="<?php echo base_url('Admin/editq/' . $row['req_no']); ?>"  class="btn btn-primary btn-sm">view
                      

                        
                        
                      </a>



                      </td>
            </tr>
        <?php endforeach;?> 
    <?php endif;?>
</tbody>
</table>
</div>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>






