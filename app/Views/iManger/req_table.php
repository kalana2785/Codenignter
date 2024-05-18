<html>


<head>

 <title>Request Table-Distribution</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">




<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>

<script src="<?= base_url('Assests/js1/jquery-3.7.1.js');?>" ></script>

<script src="<?= base_url('Assests/js1/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js1/popper.min.js');?>" ></script>
</head>


<body>

<?= $this->include('Layout/header.php') ?>
<?= $this->include('Layout/floter.php') ?>



<main id="main" class="main">

<div class="pagetitle">
      <h1>Inventory Request Table</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Tables</a></li>
          <li class="breadcrumb-item active">Unit Inventory Request Table</li>
          
        </ol>
      </nav>
</div>

 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>

<div id="table1" class="table-container active-table">
    <table class="table" name="All">
        <thead>
            <tr>
                <th scope="col">Items Name</th>
                <th scope="col">Requests Unit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
         
                <?php foreach ($requestgeneral as $row): ?>
                    <tr>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['Unit_name']; ?></td>
                        <td>
                            <?php if ($row['status'] == 1): ?>
                                <div class="alert alert-warning" role="alert">
                                    No  Send the Approval
                                </div>
                            <?php endif; ?>
                            <?php if ($row['status'] == 2): ?>
                                <div class="alert alert-info" role="alert">
                                    Send Admin Approval
                                </div>
                            <?php endif; ?>
                        </td>
                        <?php if ($row['status'] == 1): ?>
                        <td>
                            <a href="<?php echo base_url('Imanger/requestitems/' . $row['req_no'] . '/' . $row['item_id']); ?>" class="btn btn-primary btn-sm">Send Approval</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
         
        </tbody>
        <tbody>
          
                <?php foreach ($requestsugical as $row): ?>
                    <tr>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['Unit_name']; ?></td>
                        <td>
                            <?php if ($row['status'] == 1): ?>
                                <div class="alert alert-warning" role="alert">
                                    No  Send the Approval
                                </div>
                            <?php endif; ?>
                            <?php if ($row['status'] == 2): ?>
                                <div class="alert alert-info" role="alert">
                                    Send Admin Approval
                                </div>
                            <?php endif; ?>
                        </td>
                        <?php if ($row['status'] == 1): ?>
                        <td> 
                            <a href="<?php echo base_url('Imanger/requestitemssecond/' . $row['req_no'] ); ?>" class="btn btn-primary btn-sm">Send Approval</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
         
        </tbody>


    </table>
</div>


</main>
</body>
</html>         


