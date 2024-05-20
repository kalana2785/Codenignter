<html>


<head>

 <title>Add Inventory-General</title>
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


<?= $this->include('Layout/header.php') ?>
<?= $this->include('Layout/floter.php') ?>



<main id="main" class="main">



<div class="pagetitle">
      <h1>Add Inventory</h1>
      <nav>
        <ol class="breadcrumb">
        
      
          
        </ol>
      </nav>
</div>
 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>
          
          <form action="<?= base_url('Imanger/addginventory') ?>" method="post">
        

         
              <div class="row mb-3">
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_id" value="<?= $items['id']; ?>" readonly hidden>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="catogory" value="<?= $items['catogory']; ?>" readonly hidden>
                  </div>
              </div>

                 <div class="row mb-3">
                  <label for="itemname" class="col-sm-2 col-form-label">Item Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_name" value="<?= $items['item_name']; ?>" readonly>
                  </div>
                </div>
                
                <div class="row mb-3">
                    <label for="Sn number" class="col-sm-2 col-form-label">SN number Or Inventory No</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="Sn_number" value="" >
                    </div>
               </div>
                
                <div class="row mb-3" id="generalItems" >
                  <label for="warrenty" class="col-sm-2 col-form-label">Warrenty Period</label>
                    <div class="col-md-3">
                    <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                    <input type="date" class="form-control" name="ws">
                    </div>
                    <div class="col-md-3">
                    <label for="enddate" class="col-sm-2 col-form-label">End Date</label>
                    <input type="date" class="form-control" name="we">
                    </div>
              
               </div>


               
              


              
              <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="Add">
                 
                </div>
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




