<html>

<head>
    <title>User  Table</title>
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
            <h1>User Table</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">View Table</a></li>
                    <li class="breadcrumb-item active">User Table</li>
                </ol>
            </nav>
        </div>
        <?php if (session()->has('status')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('status') ?>
            </div>
        <?php endif; ?>
        <div id="table1" class="table-container active-table">
            <table id="itemTable" class="table" name="">
                <thead>
                    <tr>
                        <th scope="col">User name</th>
                        <th scope="col">Email</th>
                        <th scope="col">User Role</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($user): ?>
                        <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><?php echo $row['Username']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Usergroup_name']; ?></td>
                                <td>

               
            
                
                                <a href="<?php echo base_url('Admin/userdelete/' . $row['User_id']); ?>"  class="btn btn-danger btn-sm">Delete


                                

                                </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No Login Available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#itemTable').DataTable();
        });
    </script>

</body>

</html>
