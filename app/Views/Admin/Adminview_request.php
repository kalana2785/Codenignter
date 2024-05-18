<html>


<head>

 <title>Requset table</title>
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
      
      <th scope="col">Items Name</th>
       <th>Unit Name</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($request):?>
        <?php foreach($request as $row) : ?>
            <tr>
         
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['Unit_name']; ?></td>
                <td>
                    <?php if ($row['status']== 2) : ?>
                        <a href="<?= base_url('Admin/editq/' . $row['id'] . '/' . $row['req_no']); ?>" class="btn btn-primary btn-sm">Approval</a>
                    <?php endif; ?>
                    <?php if ($row['status']== 3) : ?>
                        <div class="alert alert-success" role="alert">
                            Approved
                        </div>
                    <?php endif; ?>
                </td>

            </tr>
        <?php endforeach;?>
        <?php else: ?>
                <tr>
                    <td colspan="3">No Request  available</td>
                </tr>
        <?php endif; ?>



</tbody>
<tbody>
    <?php if ($requestgeneral):?>
        <?php foreach($requestgeneral as $row) : ?>
            <tr>
            
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['Unit_name']; ?></td>
               
                <td>
              
                        
                      </a>
                      <a href="<?= base_url('Admin/approvalgen/' . $row['Adminreq_id']); ?>" class="btn btn-primary btn-sm">Approval</a>



                      </td>
            </tr>
        <?php endforeach;?>
        <?php else: ?>
                <tr>
                    <td colspan="3">No Request  available</td>
                </tr>
        <?php endif; ?>



</tbody>
</table>
</div>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>






