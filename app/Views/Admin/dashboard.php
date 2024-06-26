<html>
<head>

<title>Admin Dashboard</title>

<link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">

<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
<link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

<script src="assets/js/main.js"></script>

<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>


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
<?= $this->include('Layout/Admin/header.php') ?>
<?=
 $this->include('Layout/Admin/floter.php') ?>

<!-- veiw pop up msg-->
<script>
$(document).on('click', '.view_btn', function () {
    // Get the row data
    var id = $(this).closest('tr').find('td:eq(0)').text();
      var itemName = $(this).closest('tr').find('td:eq(1)').text();
      var categoryName = $(this).closest('tr').find('td:eq(2)').text();
      var typeName = $(this).closest('tr').find('td:eq(3)').text();
      var quantity = $(this).closest('tr').find('td:eq(4)').text();
    

      // Build the content for the modal
      var modalContent = `
        <p><strong>ID:</strong> ${id}</p>
        <p><strong>Item Name:</strong> ${itemName}</p>
        <p><strong>Category Name:</strong> ${categoryName}</p>
        <p><strong>Type Name:</strong> ${typeName}</p>
        <p><strong>Quantity:</strong> ${quantity}</p>
    
      `;

      // Set the content in the modal
      $('#itemDetailsContent').html(modalContent);

      // Show the modal
      $('#itemDetailsModal').modal('show');
    });
 
</script>

<main id="main" class="main">

<?php
  if(session()->getFlashdata('status')){ ?>
   <div class="alert alert-success" role="alert">
    <strong></strong> <?= session()->getFlashdata('status'); ?>
 </div>
<?php
  }
   ?>


<?php
  if(session()->getFlashdata('statusd')){ ?>
   <div class="alert alert-danger" role="alert">
    <strong></strong> <?= session()->getFlashdata('statusd'); ?>
 </div>
<?php
  }
   ?>


<!-- Check if there is an error message and display it -->
     <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" onclick="showTable(1)">All-Items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="showTable(2)">Surgical-Items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="showTable(3)">General-Items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="showTable(4)">Inventory Level</a>
      </li>
    </ul>



<div id="table1" class="table-container active-table" >
<table  id="itemTable" class="table" name="All">
  <thead>
    <tr>
  
    <th scope="col">Item Name</th>
    <th scope="col">Category</th>
    <th scope="col">Type</th>
    <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($dashboards):?>
        <?php foreach($dashboards as $row) : ?>
            <tr>
              
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['Category_Name']; ?></td>
                <td><?php echo $row['type_name']; ?></td>  
              
                <td>

               
            
                
                <a href="<?php echo base_url('Admin/delete/' . $row['id']); ?>"  class="btn btn-danger btn-sm">Delete
               

                 
                
               </a>
                </td>
                
            </tr>
        <?php endforeach;?> 
    <?php endif;?>
</tbody>
</table>
</div>

<div id="table2" class="table-container">
<!--sugical items-->
        <table  id="itemTable" class="table" name="Sugical">
          <thead>
            <tr>
             
              <th scope="col">Items Name</th>
              <th scope="col">Type Name</th>
              <th scope="col">Quantity</th>
              
             
            </tr>
          </thead>
          <tbody>
            <?php if ($sugicals):?>
                <?php foreach($sugicals as $row) : ?>
                    <tr>
                      
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['type_name']; ?></td>
                        <td><?php echo $row['quntity']; ?></td>
                        
                    
                    </tr>
                <?php endforeach;?> 
            <?php endif;?>
        </tbody>
        </table>
</div>

<!-- General items-->
<div id="table3" class="table-container">
<table  id="itemTable" class="table" name="General">
  
  <thead>
    <tr>
      
      <th scope="col">Items Name</th>
      <th scope="col">Type Name</th>
      <th scope="col">Quantity</th>
    
      <th scope="col"></th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($general):?>
        <?php foreach($general as $row) : ?>
            <tr>
                
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['type_name']; ?></td>
                <td><?php echo $row['quntity']; ?></td>
               
            </tr>
        <?php endforeach;?> 
    <?php endif;?>
</tbody>
</table>
</div>


<div id="table4" class="table-container" >
<table  id="itemTable" class="table" name="level">
  <thead>
    <tr>
  
    <th scope="col">Item Name</th>
    <th scope="col">Category</th>
    <th scope="col">Type</th>
    <th scope="col">Available Quantity</th>
    <th scope="col">Inventory Status</th>

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
                <?php
                     $Actual_quntity= $row['quntity'];
                     $Total_quntity= $row['overstock_value'];

                     $low_capacity=$Actual_quntity/$Total_quntity*100


                ?>  
                <td><?php 

                if($low_capacity<=10)
                
                {?>
                                    
                <div class="alert alert-danger" role="alert">
                              Low Stock
                </div>
                <?php 
                    
                }
                
                elseif($low_capacity<=30)
                
                {
                    ?>
                                    
                   <div class="alert alert-warning" role="alert">
                              Urgent Replenishment
                   </div>
                    <?php 
                }
                elseif($low_capacity<=50)
                
                {
                    ?>
                                    
                      <div class="alert alert-primary" role="alert">
                             Moderate Stock
                        </div>
                             
                 
                    <?php 
                }
                elseif($low_capacity<=90)
                
                {
                    ?>
                                    
                    <div class="alert alert-success" role="alert">
                                Adequate Stock
                    </div>
                           
               
                  <?php 
                }
                
                else{

                    ?>
                    <div class="alert alert-dark" role="alert">
                                Overstocked
                  </div>

                  <?php
                }
                
                
                ?></td>

           
                
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#itemTable').DataTable();
        });
    </script>


</body>
</html>