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


<div id="table1" class="table-container active-table" >
<table class="table" name="All">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Items Name</th>
       <th>Unit Name</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
   
</table>
</div>

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Request Form</h5>

              
              <form class="row g-3">
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


                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City">
                </div>
                <div class="col-md-4">
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="Zip">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End No Labels Form -->

            </div>
          </div
 
<input type="text" class="form-control" id="inputText" name="item_name" value="<?= $requestview['item_name']; ?>" readonly>

</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>






