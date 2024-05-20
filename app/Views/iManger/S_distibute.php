<html>


<head>

 <title>Sugical Distribution</title>
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
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Select BN number for Distributed</label>
                  <div class="col-sm-10">
                  <select name="ca" id="ca" class="form-control input-lg">
                    <option value="">Select BN Number</option>
                    <?php if (!empty($inventory)): ?>
                        <?php foreach ($inventory as $item): ?>
                            <option value="<?= $item['BN_number']; ?>"><?= $item['BN_number']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Items Type</label>
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
                    url: "<?php echo base_url('/imdashController/actionquntity'); ?>",
                    method: "POST",
                    data: {Cid: Cid, action: action},
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value ="">Select Type </option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value ="'+data[count].In_quntity+ '">'+data[count].In_quntity+'</option>';
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



