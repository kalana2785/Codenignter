<html>
<head>

<title>My Dashboard</title>
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

<br><br><br><br><br><br>
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
  <li class="nav-item">
    <a class="nav-link" onclick="showTable(2)">Sugical</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" onclick="showTable(3)">General</a>
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
      <th scope="col">Catogory</th>
      <th>Sn number/Bn number</th>
      <th scope="col">Avalible Quntity</th>
      <th scope="col">Issue Update</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($userData as $userList): ?>
                <?php foreach ($userList as $user): ?>
            <tr>
                <td><?php echo $user['item_name']; ?></td>
                <td><?php echo $user['Category_Name']; ?></td> 
                   <td><?php echo $user['itembox_name']; ?></td> 
                <td><?php echo $user['Quntity']; ?></td>
                <td><?php echo $user['issue_date']; ?></td>
               
                <td>

                  <a href="<?php echo base_url('unit/reqre/' . $user['Uni_id']); ?>"  class="btn btn-primary btn-sm">Request Repair 


                  

                  </a>
                </td>
              
            </tr>
        <?php endforeach;?> 
    <?php endforeach;?>
</tbody>
</table>
</div>








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