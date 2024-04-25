<html>
<head>
    <title>Item Usage View</title>
    <link href="<?= base_url('Assests/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/quill/quill.snow.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/quill/quill.bubble.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/remixicon/remixicon.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/css/style.css');?>" rel="stylesheet">
    <link href="<?= base_url('Assests/simple-datatables/style.css');?>" rel="stylesheet">

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        <div id="table1" class="table-container active-table">
            <table class="table" name="All">
                <thead>
                    <tr>
                        <th scope="col">Unit Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Issue Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $unitNames = []; // Array to store unit names
                    $quantities = []; // Array to store quantities
                    foreach ($inventory as $row):
                        $unitNames[] = $row['Unit_name']; // Store unit name
                        $quantities[] = $row['Quntity']; // Store quantity
                    ?>
                    <tr>
                        <td><?php echo $row['Unit_name']; ?></td>
                        <td><?php echo $row['Quntity']; ?></td>
                        <td><?php echo $row['issue_date']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Add canvas element for chart -->
        <canvas id="myChart"></canvas>
    </main>

    <script>
        // Get data from PHP and pass it to JavaScript
        var unitNames = <?php echo json_encode($unitNames); ?>;
        var quantities = <?php echo json_encode($quantities); ?>;

        // Create a bar chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: unitNames,
                datasets: [{
                    label: 'Quantity',
                    data: quantities,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
