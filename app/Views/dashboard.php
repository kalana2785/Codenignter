<html>
<head>

<title>My Dashboard</title>
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


<br><br><br><br><br><br>
<main id="main" class="main">

<?php
  if(session()->getFlashdata('status')){ ?>
   <div class="alert alert-success" role="alert">
    <strong>Hello </strong> <?= session()->getFlashdata('status'); ?>
 </div>
<?php
  }
   ?>
<!-- Check if there is an error message and display it -->


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Items Name</th>
      <th scope="col">Catogory</th>
      <th scope="col">Type Name</th>
      <th scope="col">Quntity</th>
      <th scope="col">Last Update</th>
      <th> </th>
    </tr>
  </thead>
  <tbody>
    <?php if ($dashboards):?>
        <?php foreach($dashboards as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['type_name']; ?></td>  
                <td><?php echo $row['quntity']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td>

                <a href="<?php echo base_url('your_edit_page/' . $row['id']); ?>" title="Edit">
                 
                 
                <i class="bi bi-pencil-square"></i>
                </a>
               

                </td>
            </tr>
        <?php endforeach;?> 
    <?php endif;?>
</tbody>
</table>



</main>


<script src="<?= base_url('Assests/js/jquery-3.7.1.js');?>" ></script>

<script src="<?= base_url('Assests/js/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js/popper.min.js');?>" ></script>

</body>
</html>