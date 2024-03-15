<html>


<head>

 <title>Add Items</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">

</head>


<body>


<?= $this->include('Layout/header.php') ?>
<?= $this->include('Layout/floter.php') ?>



<main id="main" class="main">
 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>
           edit
          <form action="<?= base_url('Imanger/updatet/'.$items['id']) ?>" method="post">
          <input type="hidden" name="_method" value="PUT">

          <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_name" value="<?= $items['item_name']; ?>" readonly>
                  </div>
                </div>
                
                
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Avaliable Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="Avaliable_total" value="<?= $items['quntity']; ?>" readonly>
                  </div>
                </div>
                <?php
                    $Actual_Total= $items['overstock_value']-$items['quntity'];

                ?>
                <div class="alert alert-warning" role="alert">
                   You can update only  <?php echo $Actual_Total; ?>
                  </div>
                 
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="At" value="<?= $Actual_Total ?>" hidden>
                  </div>
                </div>



                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Upadate Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="uq"  >
                  </div>
                </div>


              
              <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="Update">
                 
                </div>
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




