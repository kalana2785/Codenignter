<html>


<head>

 <title>Add Items</title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">

</head>


<body>

<?= $this->include('Layout/header.php') ?>
<?= $this->include('Layout/floter.php') ?>



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
      <th scope="col">Requsets Unit</th>
      
      <th> </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($request as $row): ?>
            <tr>
               
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['Unit_name']; ?></td>
                <td><?php if( $row['status'] ==1){?>
              
                  <div class="alert alert-warning" role="alert">
                   
                         No  Send the Approval
                  </div>      

              <?php } ?>
              
                  <?php if( $row['status'] ==2){?>
                    <div class="alert alert-warning" role="alert">
                      
                      Send the Approval
                </div>   
                <?php } ?>
              </td>
                <td>
                      <a href="<?php echo base_url('Imanger/requestitems/' . $row['req_no']); ?>"  class="btn btn-primary btn-sm">View
                      

                        
                        
                      </a>



                  </td>
            </tr>
        <?php endforeach; ?>
</tbody>
</table>
</div>

</main>
</body>
</html>         


