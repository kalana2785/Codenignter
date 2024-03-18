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


          <form action="<?= base_url('Admin/Addnewuser');?>" method="post">

          <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="username">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputText" name="email">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputText" name="password">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Select User Group</label>
                  <div class="col-sm-10">
                  <select name="ug" id="ug" class="form-control input-lg">

                    <option value="">Select User Group</option>
                    <?php
                      foreach($user as $row)
                      {
                        echo '<option value="'.$row["ugroup_id"].'">'.$row["Usergroup_name"].'</option>';
                      }
                    ?>

                  </select>
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






