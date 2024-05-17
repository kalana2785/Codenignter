<html>


<head>

 <title>Unit Repir Request Table</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
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
      <h1>Repair Management Table</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Request Tables</a></li>
          <li class="breadcrumb-item active">Repair Management Table</li>
          
        </ol>
      </nav>
</div>


<body>
 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>


<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
  <tr>
    <th scope="col">Items Name</th>
    <th scope="col">Unit name</th>
    <th scope="col">Repair Status</th>
    <th> </th>
</tr>
</thead>
<tbody>
    <?php if ($request): ?>
    <?php foreach ($request as $row): ?>
    <tr>
        <td><?php echo $row['item_name']; ?></td>
        <td><?php echo $row['Unit_name']; ?></td>
        <td><?php echo $row['Stage']; ?></td>
        <td>
            <a href="<?php echo base_url('Admin/requestrepair/' . $row['Re_id']); ?>" class="btn btn-primary btn-sm">Full Details</a>
           
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div class="accordion accordion-flush" id="accordionFlushExample<?php echo $row['Re_id']; ?>">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading<?php echo $row['Re_id']; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $row['Re_id']; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $row['Re_id']; ?>">
                            Read More 
                        </button>
                    </h2>
                    <div id="flush-collapse<?php echo $row['Re_id']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $row['Re_id']; ?>" data-bs-parent="#accordionFlushExample<?php echo $row['Re_id']; ?>">
                        <div class="accordion-body">

                        <p><b>Unit-In-charge Comment </b><br>
                        <?php echo $row['Comment']; ?>
                       </p>
                     


                         </p>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
                <tr>
                    <td colspan="3">No Repair available</td>
                </tr>
            <?php endif; ?>
    
</tbody>

</tbody>
</table>
</div>


</main>

</body>
</html>         


