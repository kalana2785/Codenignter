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



<script src="<?= base_url('Assests/js/bootstrap.bundle.min.js');?>" ></script>

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

<?= $this->include('Layout/header.php') ?>
<?= $this->include('Layout/floter.php') ?>


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



<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Items Name</th>
      <th scope="col">Catogory</th>
      <th scope="col">Type Name</th>
      <th scope="col">Quntity</th>
      <th scope="col">Last Update</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($dashboards):?>
        <?php foreach($dashboards as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['Category_Name']; ?></td>
                <td><?php echo $row['type_name']; ?></td>  
                <td><?php echo $row['quntity']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td>

                <a href="<?php echo base_url('Imanger/edit/' . $row['id']); ?>"  class="btn btn-primary btn-sm">Edit
                 
                 
                
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
<table class="table" name="Sugical">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Items Name</th>
      <th scope="col">Type Name</th>
      <th scope="col">SN number</th>
      <th scope="col">Batch Number</th>
      <th scope="col">Med Date</th>
      <th scope="col">Exp Date</th>
      <th scope="col">Quntity</th>
      <th scope="col"></th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($sugicals):?>
        <?php foreach($sugicals as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['type_name']; ?></td>
                <td><?php echo $row['Sn_number']; ?></td>
                <td><?php echo $row['BN_number']; ?></td>
                <td><?php echo $row['Med_date']; ?></td>
                <td><?php echo $row['Exp_date']; ?></td>
                <td><?php echo $row['quntity']; ?></td>
               
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
                <td><?php echo $row['Sn_number']; ?></td>
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