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




<div class="card">
            <div class="card-body">
              <h5 class="card-title">Request Form</h5>
           
              
              <form class="row g-3" action="<?= base_url('Admin/updatet/' . $requestview['req_no'] . '/' . $requestview['item_id']. '/' . $requestview['req_unit']); ?>" method="post">
              <input type="hidden" name="_method" value="PUT">
              <div class="col-md-12"> 
                <label for="inputName5" class="form-label">Items Name</label>
                  <input type="text" class="form-control" placeholder="" value="<?= $requestview['item_name']; ?>" readonly>
                </div>
                <div class="col-md-4">
                <label for="inputName5" class="form-label">Req Unit Name</label>
                  <input type="text" class="form-control" placeholder="" value="<?= $requestview['Unit_name']; ?>" readonly>
                </div>
                <div class="col-md-4">
                <label for="inputName5" class="form-label">Req Quntity</label>
                  <input type="text" class="form-control" placeholder="" value="<?= $requestview['req_quntity']; ?>" readonly>
                </div>
                <div class="col-md-4">
                <label for="inputName5" class="form-label">Req Date/Time</label>
                  <input type="text" class="form-control" placeholder="" value="<?= $requestview['Date']; ?>" readonly>
                </div>
                <div class="col-6">
                <label for="inputName5" class="form-label">Approval Quntity</label>
                  <input type="text" class="form-control" placeholder="" value="<?= $requestview['ima_quntity']; ?>" readonly>
                </div>
                <div class="col-6">
                <label for="inputName5" class="form-label">Approval Date/Time</label>
                  <input type="text" class="form-control" placeholder="" value="<?= $requestview['Date']; ?>" readonly>
                </div>

                <div class="col-6">
                <label for="inputName5" class="form-label">Stock Avaliable</label>
                  <input type="number" class="form-control" placeholder="" value="<?= $requestview['quntity']; ?>" name="quntity" readonly >
                </div>
                 
                
                <div class="col-6">
                <label for="inputName5" class="form-label">Stock Avaliable</label>
                  <input type="number" class="form-control" placeholder="" value="<?= $requestview['req_unit']; ?>" name="unit" readonly >
                </div>


                <div class="col-md-12">
                  <input type="number" class="form-control" placeholder="Quntity Add" name="Adminq">
                </div>

               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            
                <label for="inputName5" class="form-label">Anthor Request</label>
                <div id="table1" class="table-container active-table" >
                    <table class="table" name="All">
                    <thead>
                        <tr>
                      
                        
                        <th>Unit Name</th>
                        <th>Quntity </th>
                        </tr>

                        <?php if ($requestviewall):?>
                                <?php foreach($requestviewall as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['Unit_name']; ?></td>
                                        <td><?php echo $row['req_quntity']; ?></td>
                                    </tr>
                                <?php endforeach;?> 
                     <?php endif;?>


                    </thead>
                    <tbody>
                    
                    </table>
                </div>


              </form><!-- End No Labels Form -->

            </div>
</div>


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>






