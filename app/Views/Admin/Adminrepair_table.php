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
    <th scope="col">Unit name</th>
    <th scope="col">Repair Status</th>
    <th> </th>
</tr>
</thead>
<tbody>
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
                        <p><b>Warranty Start Date -</b><?php echo $row['W_start']; ?></p>
                        <p><b>Warranty End Date -</b><?php echo $row['W_end']; ?></p>     
                         <p >
                             
                               <b>Warranty Avaliable duration</b> <br><br>
                              
                               <?php
                        
                        $startDate = new DateTime($row['W_start']);
                        $endDate = new DateTime($row['W_end']);
                        $dateDifference = $startDate->diff($endDate);
                        echo $dateDifference->y . ' years, ' . $dateDifference->m . ' months, ' . $dateDifference->d . ' days';
                        ?>


                         </p>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>

    
</tbody>

</tbody>
</table>
</div>


</main>

</body>
</html>         


