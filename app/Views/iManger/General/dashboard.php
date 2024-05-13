<html>
<head>

<title>My Dashboard-general</title>
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
<?= $this->include('Layout/Generalim/header.php') ?>
<?=
 $this->include('Layout/Generalim/usersldebar.php') ?>

<!-- veiw pop up msg-->
<script>
$(document).on('click', '.view_btn', function () {
    // Get the row data
    var id = $(this).closest('tr').find('td:eq(0)').text();
      var itemName = $(this).closest('tr').find('td:eq(1)').text();
      var categoryName = $(this).closest('tr').find('td:eq(2)').text();
      var typeName = $(this).closest('tr').find('td:eq(3)').text();
      var quantity = $(this).closest('tr').find('td:eq(4)').text();
      var date = $(this).closest('tr').find('td:eq(5)').text();

      // Build the content for the modal
      var modalContent = `
        <p><strong>ID:</strong> ${id}</p>
        <p><strong>Item Name:</strong> ${itemName}</p>
        <p><strong>Category Name:</strong> ${categoryName}</p>
        <p><strong>Type Name:</strong> ${typeName}</p>
        <p><strong>Quantity:</strong> ${quantity}</p>
        <p><strong>Date:</strong> ${date}</p>
      `;

      // Set the content in the modal
      $('#itemDetailsContent').html(modalContent);

      // Show the modal
      $('#itemDetailsModal').modal('show');
    });
 
</script>
<br><br><br><br><br><br>
<main id="main" class="main">
  <h1>welcome to <?= $userdata->Username ;?></h1>
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
        <a class="nav-link" onclick="showTable(3)">General</a>
      </li>
    </ul>



<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
     
      <th scope="col">Items Name</th>
      <th scope="col">Catogory</th>
      <th scope="col">Type Name</th>
      <th scope="col">Quntity</th>
    
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($dashboards):?>
        <?php foreach($dashboards as $row) : ?>
            <tr>
               
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['Category_Name']; ?></td>
                <td><?php echo $row['type_name']; ?></td>  
                <td><?php echo $row['quntity']; ?></td> 
               
                <td>

             
                <a href="#"  class="btn btn-primary view_btn">View</a>

                </td>
                <td>
                      <a href="<?php echo base_url('Imanger/editq/' . $row['id']); ?>"  class="btn btn-primary btn-sm">Drop Inventory
                      

                        
                        
                      </a>



                 </td>
            </tr>
        <?php endforeach;?> 
    <?php endif;?>
</tbody>
</table>
</div>



<!-- General items-->
<div id="table3" class="table-container">
<table class="table" name="General">
  
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Items Name</th>
      <th scope="col">Type Name</th>
      <th scope="col">SN number</th>
      <th scope="col">Warranty Period </th>
      <th scope="col">Quntity</th>
      <th scope="col"></th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($general):?>
        <?php foreach($general as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['type_name']; ?></td>
              
               <td>  
                         <!-- Calulate warrenty period-->
                          <?php
                        
                          $startDate = new DateTime($row['W_start']);
                          $endDate = new DateTime($row['W_end']);
                          $dateDifference = $startDate->diff($endDate);
                          echo $dateDifference->y . ' years, ' . $dateDifference->m . ' months, ' . $dateDifference->d . ' days';
                          ?>
                </td> 
                <td><?php echo $row['quntity']; ?></td>
               
            </tr>
        <?php endforeach;?> 
    <?php endif;?>
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
<script>
    function showTable(tableNumber) {
      // Hide all tables
      document.querySelectorAll('.table-container').forEach(function(table) {
        table.classList.remove('active-table');
      });

      // Show the selected table
      document.getElementById('table' + tableNumber).classList.add('active-table');
    }

  </script>




</body>
</html>