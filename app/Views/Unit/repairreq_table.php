<html>


<head>

 <title>Add Items</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
 <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>
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

<body>




<main id="main" class="main">
 
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
  
    <th scope="col">Repair Status</th>
    <th> </th>
</tr>
</thead>
<tbody>
    <?php foreach ($request as $row): ?>
    <tr>
        <td><?php echo $row['item_name']; ?></td>
       
        <td><?php echo $row['Stage']; ?></td>
        <td>
            <a href="<?php echo base_url('Imanger/requestrepair/' . $row['Re_id']); ?>" class="btn btn-primary btn-sm">Full Details</a>
           
        </td>
    </tr>
    <tr>
       
    </tr>
    <?php endforeach; ?>
</tbody>

</tbody>
</table>
</div>


</main>

</body>
</html>         


