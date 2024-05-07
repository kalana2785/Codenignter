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


    <main id="main" class="main">
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
                    $totalQuantity = 0; 
                    $unitNames = []; // Array to store unit names
                    $quantities = []; // Array to store quantities
                    foreach ($inventory as $row):
                        // Store unit name and quantity for chart
                        $unitNames[] = $row['Unit_name'];
                        $quantities[] = $row['Quntity'];
                        ?>
                        <tr>
                            <td><?php echo $row['Unit_name']; ?></td>
                            <td><?php echo $row['Quntity']; ?></td>
                            <td><?php echo $row['issue_date']; ?></td>
                        </tr>
                    <?php
                        $totalQuantity += $row['Quntity']; // Sum up the quantity
                        $avaliabletotl = $row['quntity'];
                        // padridation calculation
                        $padition = $totalQuantity / 10 * 12;
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="3">Distributed Quantity: <?php echo $totalQuantity; ?></td>
                        <td colspan="3">Inventory Available Quantity: <?php echo $avaliabletotl; ?></td>
                        <td colspan="3">Annual Peditation: <?php echo $padition; ?></td>
                        <td colspan="3">Annual Peditation: <?php 
                        
                        if($padition == $avaliabletotl)
                        {
                            echo "not order this year";
                        }
                        else
                        {
                            echo "order".$orderquntity=$padition-$avaliabletotl;
                        }
                        ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Add canvas element for chart -->
        <canvas id="myChart"></canvas>
    </main>

    <script>
        // Get data from PHP and pass it to JavaScript
        var unitNames = <?= json_encode($unitNames) ?>;
        var quantities = <?= json_encode($quantities) ?>;

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
