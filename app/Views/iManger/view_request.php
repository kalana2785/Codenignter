<html>


<head>

 <title>View Full Details-Request Item</title>
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
                  <input type="text" class="form-control" id="inputText" name="" value="<?= $req['catogory']; ?>" readonly>
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
       
                <?php if($req['catogory'] == 1): ?>
                      <div class="row mb-3">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Select BN number for Distributed</label>
                          <div class="col-sm-10">
                              <select name="itemboxname" id="" class="form-control input-lg" require>
                                  <option value="">Select BN Number</option>
                                  <?php if (!empty($inventory)): ?>
                                      <?php foreach ($inventory as $item): ?>
                                          <option value="<?= $item['BN_number']; ?>"><?= $item['BN_number']; ?></option>
                                      <?php endforeach; ?>
                                  <?php endif; ?>
                              </select>
                          </div>
                      </div>
                  <?php endif; ?>

                  <?php if($req['catogory'] == 2): ?>
                      <div class="row mb-3">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Select SN number for Distributed</label>
                          <div class="col-sm-10">
                              <select name="itemboxname" id="SN" class="form-control input-lg" require>
                                  <option value="">Select SN Number</option>
                                  <?php if (!empty($snNumbers)): ?>
                                      <?php foreach ($snNumbers as $item): ?>
                                          <option value="<?= $item['Sn_number']; ?>"><?= $item['Sn_number']; ?></option>
                                      <?php endforeach; ?>
                                  <?php endif; ?>
                              </select>
                          </div>
                      </div>
                  <?php endif; ?>




               
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




