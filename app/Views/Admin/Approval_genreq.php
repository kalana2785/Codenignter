<html>


<head>

 <title>Approval general item</title>
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




<div class="card">
            <div class="card-body">
              <h5 class="card-title">Request Form</h5>
           
              <form class="row g-3" action="<?= base_url('Admin/addinventory'); ?>" method="post">

              <div class="col-md-12"> 
                <label for="input1" class="form-label">Items Name</label>
                  <input type="text" class="form-control"  placeholder="" value="<?= $requestview['item_name']; ?>" readonly>
                </div>
               
                  <input type="text" class="form-control" name="req_id" placeholder="" value="<?= $requestview['Adminreq_id']; ?>" readonly hidden>
              

                <div class="col-md-12">
                <label for="input2" class="form-label">Requset Unit Name</label>
                  <input type="text" class="form-control" placeholder="" value="<?= $requestview['Unit_name']; ?>" readonly>
                </div>
                <div class="col-md-12">
                <label for="input3" class="form-label">Serial Number</label>
                  <input type="text" class="form-control" placeholder="" name="sn_num" value="<?= $requestview['SN_number']; ?>" readonly>
                </div>
                <input type="text" class="form-control" name="unit_id" value="<?= $requestview['req_unitid']; ?>" readonly hidden>
                <input type="text" class="form-control" name="category" value="<?= $requestview['catogory']; ?>" readonly hidden>
                <input type="text" class="form-control" name="item_id" value="<?= $requestview['id']; ?>" readonly hidden>
                <input type="text" class="form-control" name="" value="<?= $requestview['quntity']; ?>" readonly  hidden>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Approval</button>
                  
                </div>
            
              

              </form>
              
             
            </div>
</div>


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>






