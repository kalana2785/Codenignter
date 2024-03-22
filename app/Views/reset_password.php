<html>


<head>

 <title>Forgot Password</title>
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
<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php endif; ?>
<?php if (session()->has('status')): ?>
    <div class="alert alert-success" role="alert">
        <?= session('status') ?>
    </div>
<?php endif; ?>
       

<form action="<?= base_url('user/reset');?>" method="post">

<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Forgot Password</label>
</div>

<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="inputText" name="Npassword">
    </div>
</div>

<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="inputText" name="CPassword">
    </div>
</div>

<!-- Hidden input field to store the token value -->
<input type="hidden" name="token" value="<?= $token ?>">

<div class="text-center">
    <input type="submit" class="btn btn-primary" value="Submit">
</div>
</form>


 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>






