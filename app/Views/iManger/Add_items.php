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

          <form action="<?= base_url('Imanger/Additems');?>" method="post">

          <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="item_name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                  <select name="ca" id="ca" class="form-control input-lg">

                    <option value="">Select Catogory</option>
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
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Items Type</label>
                  <div class="col-sm-10">
                  <select name="ty" id="ty" class="form-control input-lg">

                    <option value="">Select Type</option>
                    

                  </select>
                  </div>
                </div>
             
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" name="quantity">

                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Serial Number</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" name="sn">

                  </div>
                </div>



                <div class="row mb-3" id="additionalInputRow" style="display:none;">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">BN Number</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="additionalInput" name="BN">
                  </div>
                  <br><br>
                  <div class="col-md-6">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">MED Date</label>
                  <input type="date" class="form-control" name="Med">
                </div>
                <div class="col-md-6">
                <label for="inputEmail3" class="col-sm-2 col-form-label">EXP Date</label>
                  <input type="date" class="form-control" name="Exp">
                </div>




              </div>
              <div class="row mb-3" id="generalItems" style="display:none;">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Warrenty Period</label>
                  <div class="col-md-6">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Start Date</label>
                  <input type="date" class="form-control" name="ws">
                </div>
                <div class="col-md-6">
                <label for="inputEmail3" class="col-sm-2 col-form-label">End Date</label>
                  <input type="date" class="form-control" name="we">
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



