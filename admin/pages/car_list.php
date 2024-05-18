<?php 
include('../../controller/config.php');
include('../include/head.php');?>

<body class="sb-nav-fixed">
    <?php include('../include/nav.php');?>
    <div id="layoutSidenav">
        <?php include('../include/side.php');?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4 mt-4">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Cars Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Vehicle Name</th>
                                        <th>Fuel Tank Capacity</th>
                                        <th>Engine</th>
                                        <th>Power</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Vehicle Name</th>
                                        <th>Fuel Tank Capacity</th>
                                        <th>Engine</th>
                                        <th>Power</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $sql = "SELECT vehicle_name, fuel_tank_capacity, engine, power FROM cars";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["vehicle_name"] . "</td>";
                                            echo "<td>" . $row["fuel_tank_capacity"] . "</td>";
                                            echo "<td>" . $row["engine"] . "</td>";
                                            echo "<td>" . $row["power"] . "</td>";
                                            echo "<td><button class='btn btn-sm'>View Posting</button> | <button class='btn btn-sm'>Edit</button> | <button class='btn btn-sm'>Delete</button></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No data available</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/datatables-simple-demo.js"></script>
</body>
</html>
