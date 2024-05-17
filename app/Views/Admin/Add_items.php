<html>


<head>


<title>Add Item Type</title>
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
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
      <h1>Add New Item </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Add Section</a></li>
          <li class="breadcrumb-item active">Add Item </li>
          
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

          <form action="<?= base_url('Admin/Additems');?>" method="post">

                <div class="row mb-3">
                  <label for="input1" class="col-sm-2 col-form-label">Item Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_name" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input2" class="col-sm-2 col-form-label">Select Category</label>
                  <div class="col-sm-10">
                  <select name="ca" id="ca" class="form-control input-lg">

                    <option value="">Select Category</option>
                    <?php
                      foreach($catogory as $row)
                      {
                        echo '<option value="'.$row["Cid"].'">'.$row["Category_Name"].'</option>';
                      }
                    ?>

                  </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input3" class="col-sm-2 col-form-label">Items Type</label>
                  <div class="col-sm-10">
                  <select name="ty" id="ty" class="form-control input-lg">

                    <option value="">Select Type</option>
                    

                  </select>
                  </div>
                </div>
             
             
               
   
               
                





           
            

              
              <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="submit">
                 
                </div>
           </form>

 


</main>

</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function(){
        $('#ca').change(function(){
            var Cid = $('#ca').val();
            var action = 'get_ty';

            if (Cid != '') {
                $.ajax({
                    url: "<?php echo base_url('/imdashController/action'); ?>",
                    method: "POST",
                    data: {Cid: Cid, action: action},
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value ="">Select Type </option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value ="'+data[count].type_id+ '">'+data[count].type_name+'</option>';
                        }
                        $('#ty').html(html);

                        // Check if the selected category value is 1
                        if (Cid == 1) {
                           
                            $('#additionalInputRow').show();
                            $('#generalItems').hide();
                        } if(Cid == 2) {
                           
                           $('#generalItems').show(); 
                            $('#additionalInputRow').hide();
                           
                        }
                       
                    }
                });
            } else {
                $('#ty').val('');
                // Hide the additional input box if no category is selected
                $('#additionalInputRow').hide();
            }
        });
    });
</script>



