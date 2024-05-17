<html>


<head>

 <title>Add Inventory-Sugical</title>


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
           
          <form action="<?= base_url('Imanger/updatet/'.$items['id']) ?>" method="post">
          <input type="hidden" name="_method" value="PUT">

        
               <div class="row mb-3">
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_id" value="<?= $items['id']; ?>" readonly hidden>
                  </div>
              </div>


              <div class="row mb-3">
                  <label for="input1" class="col-sm-2 col-form-label">Item Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_name" value="<?= $items['item_name']; ?>" readonly>
                  </div>
              </div>
                
                <div class="row mb-3" >
                  <label for="input2" class="col-sm-2 col-form-label">BN Number</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="additionalInput" name="BN" require>
                </div>
                  <br><br>
                <div class="col-md-3">
                  <label for="input3" class="col-sm-2 col-form-label">MED Date</label>
                  <input type="date" class="form-control" name="Med">
                </div>
                <div class="col-md-3">
                <label for="input4" class="col-sm-2 col-form-label">EXP Date</label>
                  <input type="date" class="form-control" name="Exp">
                </div>
                </div>

               
                <?php
                    $Actual_Total= $items['overstock_value']-$items['quntity'];

                ?>
                <div class="alert alert-warning" role="alert">
                    Only Insert is Permitted <?php echo $Actual_Total; ?>
                  </div>
                 
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="At" value="<?= $Actual_Total ?>" hidden>
                  </div>
                </div>



                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="uq"  >
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




