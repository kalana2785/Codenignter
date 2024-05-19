<html>
<head>

<title>Unit Wise Dashboard</title>
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
<style>
    .table-container {
      display: none;
    }
    .active-table {
      display: block;
    }
  </style>
</head>

<body>
<?= $this->include('Layout/Unit/header.php') ?>
<?=
 $this->include('Layout/Unit/Unit_slidebar.php') ?>

<!-- veiw pop up msg-->


<main id="main" class="main">
<?php
  if(session()->getFlashdata('status')){ ?>
   <div class="alert alert-success" role="alert">
    <strong>Hello </strong> <?= session()->getFlashdata('status'); ?>
 </div>
<?php
  }
   ?>
<!-- Check if there is an error message and display it -->
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" onclick="showTable(1)">All</a>
  </li>

</ul>



<script>
    function showTable(tabIndex) {
      $('.table-container').removeClass('active-table');
      $('#table' + tabIndex).addClass('active-table');
    }
</script>






<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
    
      <th scope="col">Items Name</th>
      <th scope="col">Total Quntity</th>
     
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($userData as $item): ?>
            <tr>
            
            <td><?= $item['item_name']; ?></td>
            <td><?= $item['total_quantity']; ?></td>
            

               
                <td>

                <a href="<?php echo base_url('unit/fulld/' . $item['id'] . '/' . $item['Unit_id']); ?>"class="btn btn-primary btn-sm">View Full Details 
                </td>
              
            </tr>
        <?php endforeach;?> 

</tbody>
</table>
</div>


<!DOCTYPE html>
<html>
<head>
    <title>User Inventory</title>
</head>
<body>


              
</body>
</html>






<!-- view Modal  -->
<div class="modal fade" id="itemDetailsModal" tabindex="-1" role="dialog" aria-labelledby="itemDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemDetailsModalLabel">Item Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div id="itemDetailsContent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</main>




</body>
</html>