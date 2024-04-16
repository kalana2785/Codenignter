<html>


<head>

 <title>Repair Request</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">

</head>


<body>

<?= $this->include('Layout/Unit/header.php') ?>
<?=
 $this->include('Layout/Unit/Unit_slidebar.php') ?>



<main id="main" class="main">
 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('status')): ?>
    <div class="alert alert-success" role="alert">
        <?= session('status') ?>
    </div>
<?php endif; ?>
        
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>     

           <form action="<?= base_url('unit/request');?>" method="post">



    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
        <div class="col-sm-10">
            <!-- Assuming item_name is a field in your database, replace it with the correct field name -->
            <input type="text" class="form-control" id="inputText" name="item_name" value="<?= $unititems['item_name'] ?>">
        </div>
    </div>

    <input type="text" class="form-control" id="inputText" name="item_id" value="<?= $unititems['item_id'] ?>" hidden>
    <input type="text" class="form-control" id="inputText" name="unit" value="<?= $unititems['Unit_id'] ?>" hidden>

    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Comment</label>
        <div class="col-sm-10">
            <!-- Assuming item_name is a field in your database, replace it with the correct field name -->
            <input type="text" class="form-control" id="inputText" name="Quntity" >
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




