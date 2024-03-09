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
                  <input type="text" class="form-control" id="inputText" name="ca">
                  </div>
                </div>
                
             
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Quntity</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" name="quantity">

                  </div>
                </div>
               
                


              
              <div class="text-center">
                  <input type="submit" class="btn btn-primary" value="submit">
                 
                </div>
           </form>

 


</main>

</body>


</html>