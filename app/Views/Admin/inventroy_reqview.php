<html>


<head>

 <title>Add Inventory-Sugical</title>
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
         
          <form action="<?= base_url('Admin/Approvalinv/'. $Inventory['item_id']) ?>" method="post">


          <input type="hidden" name="_method" value="PUT">

         
          <div class="row mb-3">
        

                  <div class="col-sm-10">
        
                  <input type="text" class="form-control" id="inputText" name="Inv_id" value="<?= $Inventory['Inventory_id']; ?>" readonly >
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
                  <input type="submit" class="btn btn-primary" value="Approve">
                 
                </div>
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




