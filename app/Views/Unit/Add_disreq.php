<html>


<head>

 <title>Request Items</title>
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

          <form action="<?= base_url('Imanger/Additems');?>" method="post">

          <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                  <select name="ca" id="ca" class="form-control input-lg">

                    <option value="">Select Items</option>
                    <?php
                      foreach($items as $row)
                      {
                        echo '<option value="'.$row["id"].'">'.$row["item_name"].'</option>';
                      }
                    ?>

                  </select>
                  </div>
                </div>
               
             
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" name="quantity">

                  </div>
                </div>
                

              
              <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="submit">
                 
                </div>
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





