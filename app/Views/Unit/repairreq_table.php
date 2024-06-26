<html>


<head>

 <title>Repair Status Table</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
 <link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
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
    
<div class="pagetitle">
      <h1>Repair Table</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Tables</a></li>
          <li class="breadcrumb-item active">Repair Table</li>
          
        </ol>
      </nav>
</div>
 
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
    <th scope="col">Serial Number</th>
    <th scope="col">Repair Status</th>
    <th> </th>
</tr>
</thead>
<tbody>
<?php if ($request): ?>
    <?php foreach ($request as $row): ?>
    <tr>
        <td><?php echo $row['item_name']; ?></td>
        <td><?php echo $row['repair_snnum']; ?></td>
       
        <td><?php echo $row['Stage']; ?></td>
        <td>
            <a href="<?php echo base_url('unit/requestrepair/' . $row['Re_id']); ?>" class="btn btn-primary btn-sm">Full Details</a>
           
        </td>
    </tr>
    <tr>
       
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


