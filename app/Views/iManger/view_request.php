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
          
          <form action="<?= base_url('Imanger/reupdate/'.$req['req_no']) ?>" method="post">
          <input type="hidden" name="_method" value="PUT">
        
          <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Request Item Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="" value="<?= $req['item_name']; ?>" readonly>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Request Unit Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="" value="<?= $req['Unit_name']; ?>" readonly>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="" value="<?= $req['req_quntity']; ?>" readonly>
                  </div>
                </div>

               
                <div class="alert alert-warning" role="alert">
                   Now   <?= $req['quntity']; ?> Avaliable

                  </div>

                  <input type="text" class="form-control" id="inputText" name="Avqu" value=" <?= $req['quntity']; ?>" hidden>



 
                  <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Add Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="AddQu" value="">
                  </div>
                </div>


              <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="Request">
                 
                </div>
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




