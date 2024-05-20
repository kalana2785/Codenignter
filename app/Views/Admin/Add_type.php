<html>


<head>

 <title>Add Item Type</title>
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


<div class="pagetitle">
      <h1>Add Item Type</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Add Section</a></li>
          <li class="breadcrumb-item active">Add Item Type</li>
          
        </ol>
      </nav>
</div>
 
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


          <form action="<?= base_url('Admin/Addnewtype');?>" method="post">

          <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Item Type</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="type_name">
                  </div>
                </div>

              
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Select category</label>
                  <div class="col-sm-10">
                  <select name="Ca" id="Ca" class="form-control input-lg">

                    <option value="">Select category</option>
                    <?php
                      foreach($catogory as $row)
                      {
                        echo '<option value="'.$row["Cid"].'">'.$row["Category_Name"].'</option>';
                      }
                    ?>

                  </select>
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






