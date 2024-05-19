<html>


<head>

 <title>Repir Stage-unit</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">

<link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

<script src="assets/js/main.js"></script>

<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>


<script src="<?= base_url('Assests/js1/jquery-3.7.1.js');?>" ></script>

<script src="<?= base_url('Assests/js1/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js1/popper.min.js');?>" ></script>

</head>

<style >
.vertical-progress {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.progress-step {
    position: relative;
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.progress-step .step-number {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #ccc;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
}

.progress-step.completed .step-number {
    background-color: #28a745; /* Green color for completed steps */
    color: white;
}

.progress-step .step-label {
    margin-left: 10px;
}


.progress-step:not(:last-child) {
    margin-bottom: 20px;
}


</style>

<?= $this->include('Layout/Unit/header.php') ?>
<?=
 $this->include('Layout/Unit/Unit_slidebar.php') ?>
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
          
          <form action="<?= base_url('Imanger/repairupdate/'.$reqre['Re_id']) ?>" method="post">
          <input type="hidden" name="_method" value="PUT">
        
              <div class="row mb-3">
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="" value="<?= $reqre['Re_id']; ?>" hidden>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="" value="<?= $reqre['itembox_name']; ?>"  readonly>
                  </div>
                </div>



               
             
                
              
                <div class="vertical-progress">
                    <?php foreach ($stages as $index => $stage): ?>
                        <div class="progress-step <?= ($index < $progress) ? 'completed' : ''; ?>">
                            <div class="step-number"><?= $index + 1; ?></div>
                            <div class="step-label"><?= $stage; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                

             
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




