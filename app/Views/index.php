<html>
<head>

<title>Login</title>
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

<div class="container">

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">Login HIMS</span>
          </a>
        </div><!-- End Logo -->
       
        <?php if(isset($validation)): ?>
   <div class="alert alert-danger" role="alert">
       <?= $validation->listErrors() ?>
   </div>
<?php endif; ?>

<?php
  if(session()->getFlashdata('errormessage')){ ?>
   <div class="alert alert-danger" role="alert">
    <strong>Hello </strong> <?= session()->getFlashdata('errormessage'); ?>
 </div>
<?php
  }
   ?>

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>

            <form action="<?= base_url('user/login');?>" method="post">

              <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <input type="email" name="email" class="form-control" id="yourUsername" >
                  <div class="invalid-feedback">Please enter your username.</div>
                </div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword" >
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

             
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
              </div>

              <div class="col-12">
                      <p class="small mb-0"> <a href="<?= base_url('/forgot');?>">Forgot your Password</a></p>
                    </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

</section>

</div>



</body>
</html>