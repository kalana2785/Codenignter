<html>
<head>

<title>My Dashboard</title>
<link  href="<?= base_url('Assests/css/bootstrap.min.css');?>" rel="stylesheet">

</head>

<body>

<nav class="navbar fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="#">Fixed top</a>
</nav>
<br><br><br><br><br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Items Name</th>
      <th scope="col">Catogory</th>
      <th scope="col">Quntity</th>
      <th scope="col">Last Update</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($dashboards):?>
      <?php foreach($dashboards as $row) : ?>
    <tr>
    
      <td><?php echo  $row['id']; ?></td>
      <td><?php echo  $row['item name']; ?></td>
      <td><?php echo  $row['catogory']; ?></td>
      <td><?php echo  $row['quntity']; ?></td>
      <td><?php echo  $row['Date']; ?></td>
    </tr>
   <?php endforeach;?> 
  <?php endif;?>
  </tbody>
</table>






<script src="<?= base_url('Assests/js/jquery-3.7.1.js');?>" ></script>

<script src="<?= base_url('Assests/js/bootstrap.min.js');?>" ></script>
<script src="<?= base_url('Assests/js/popper.min.js');?>" ></script>

</body>
</html>