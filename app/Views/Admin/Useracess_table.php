<html>

<head>
    <title>User Access Table</title>
    <link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('Assests/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    
 
    <link href="<?= base_url('Assests/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('Assests/simple-datatables/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>

<body>

    <?= $this->include('Layout/Admin/header.php') ?>

    <?= $this->include('Layout/Admin/floter.php') ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User Login Table</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">View Table</a></li>
                    <li class="breadcrumb-item active">User Login Table</li>
                </ol>
            </nav>
        </div>

        <div id="table1" class="table-container active-table">
            <table id="itemTable" class="table" name="">
                <thead>
                    <tr>
                        <th scope="col">User name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Agent</th>
                        <th scope="col">IP Address</th>
                        <th scope="col">Login Time</th>
                        <th scope="col">Logout Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($useracess): ?>
                        <?php foreach ($useracess as $row) : ?>
                            <tr>
                                <td><?php echo $row['Username']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Agent']; ?></td>
                                <td><?php echo $row['Ip']; ?></td>
                                <td><?php echo $row['Login_time']; ?></td>
                                <td><?php echo $row['Logout_time']; ?></td>
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
