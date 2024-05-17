<html>


<head>

 <title>Admin Add Inventory</title>
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

<?= $this->include('Layout/Admin/header.php') ?>

<?= $this->include('Layout/Admin/floter.php') ?>



<main id="main" class="main">


<div class="pagetitle">
      <h1>Add Inventory </h1>
      <nav>
        <ol class="breadcrumb">
          
          
        </ol>
      </nav>
</div>

<body>







 
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
         
          <form action="<?= base_url('Admin/Approvalinv/'. $Inventory['item_id']) ?>" method="post">


          <input type="hidden" name="_method" value="PUT">

         
          <div class="row mb-3">
        

                  <div class="col-sm-10">
        
                  <input type="text" class="form-control" id="inputText" name="Inv_id" value="<?= $Inventory['Inventory_id']; ?>" readonly hidden >
                  </div>




                  <div class="col-sm-10">
                  <label for="input" class="col-sm-6 col-form-label">Item name</label>
                  <input type="text" class="form-control" id="inputText" name="item_id" value="<?= $Inventory['item_name']; ?>" readonly >
                  </div>



              </div>
              <div class="row mb-3">

                    <div class="col-sm-10">
                    <label for="input" class="col-sm-6 col-form-label">BN Number(drug)</label>
                    <input type="text" class="form-control" id="inputText" name="BN_number" value="<?= $Inventory['BN_number']; ?>" readonly >
                    
                    </div>
                    <div class="col-sm-10">
                    <label for="input" class="col-sm-6 col-form-label">SN Number</label>
                    <input type="text" class="form-control" id="inputText" name="SN_number" value="<?= $Inventory['Sn_number']; ?>" readonly >
                    
                    </div>




            </div>
            


            <div class="row mb-3">

                <div class="col-sm-10">
                <label for="input" class="col-sm-6 col-form-label">Avaliable Quntity(per)</label>
                <input type="text" class="form-control" id="inputText" name="reqest_quntity" value="<?= $Inventory['In_quntity']; ?>" readonly >

                </div>



           </div>
            


           <?php
                    $Actual_Total=$Inventory['overstock_value']-$Inventory['quntity'];
                    $request_total=$Inventory['In_quntity']+$Inventory['quntity'];

                ?>
                <div class="alert alert-warning" role="alert">
                   You can update only  <?php echo $Actual_Total; ?>
                  </div>
                 
                  <div class="col-sm-10">
                    
                  <input type="text" class="form-control" id="inputText" name="Overstock_value" value="<?= $Inventory['overstock_value']; ?>" hidden>
                  <input type="text" class="form-control" id="inputText" name="Total_request" value="<?= $request_total ?>" hidden>
                  </div>
   
                  <div class="row mb-3">

              



              
              <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="Add">
                 
                </div>
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




