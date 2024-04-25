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
</head>
<body>
    <?= $this->include('Layout/header.php') ?>
    <?= $this->include('Layout/floter.php') ?>

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
                    foreach ($inventory as $row):
                    ?>
                    <tr>
                        <td><?php echo $row['Unit_name']; ?></td>
                        <td><?php echo $row['Quntity']; ?></td>
                        <td><?php echo $row['issue_date']; ?></td>
                    </tr>
                    <?php
                        $totalQuantity += $row['Quntity']; // Sum up the quantity
                        $avaliabletotl =$row['quntity'];
                       // padridation calculation
                       $padition=$totalQuantity/10*12;

                    endforeach;
                    ?>
                    <tr>
                        <td colspan="3">Distributed Quantity: <?php echo $totalQuantity; ?></td>
                        <td colspan="3">Inventory Avaliable Quantity: <?php echo $avaliabletotl; ?></td>
                        <td colspan="3">Annual Peditation: <?php echo $padition; ?></td>
                        <td colspan="3">Annual Peditation: <?php 
                        
                        if($padition==$avaliabletotl)
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
    </main>
</body>
</html>
