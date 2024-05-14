<html>


<head>

 <title>Req </title>
 <link  href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
<link  href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">
<link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">




<script src="<?= base_url('Assests/bootstrap/js/bootstrap.bundle.min.js');?>" ></script>

<script src="<?= base_url('Assests/js1/jquery-3.7.1.js');?>" ></script>

<script src="<?= base_url('Assests/js1/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js1/popper.min.js');?>" ></script>



</head>


<body>

<?= $this->include('Layout/Unit/header.php') ?>
<?=
 $this->include('Layout/Unit/Unit_slidebar.php') ?>



<main id="main" class="main">
 
<!-- Check if there is an error message and display it -->
<?php if (session()->has('status')): ?>
    <div class="alert alert-success" role="alert">
        <?= session('status') ?>
    </div>
<?php endif; ?>
        
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>     

           <form action="<?= base_url('unit/request');?>" method="post">


              <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Select Category</label>
                  <div class="col-sm-10">
                  <select name="ca" id="ca" class="form-control input-lg">
                    <option value="">Select Category</option>
                    <?php if (!empty($inventory)): ?>
                        <?php foreach ($inventory as $item): ?>
                            <option value="<?= $item['Cid']; ?>"><?= $item['Category_Name']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                  </div>
              </div>   
                <br>
    
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Items </label>
                  <div class="col-sm-10">
                  <select name="item_id" id="ty" class="form-control input-lg">

                    <option value="">Select Items</option>
                    

                  </select>
                  </div>
                </div>
   
                <div class="row mb-3" id="additionalInputRow" style="display:none;">

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Request Quntity</label>
                    <div class="col-sm-10">
                
                        <input type="text" class="form-control" id="inputText" name="Quntity" >
                    </div>
                </div>
                </div>

              
              
               </div>
                <input type="text" class="form-control" id="inputText" name="unit" value="<?= $unitid['Unit_id'] ?>" hidden>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Request">
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
                        var html = '<option value ="">Select items </option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value ="'+data[count].id+ '">'+data[count].item_name+'</option>';
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
