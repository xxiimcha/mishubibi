<?php 
include('../controller/config.php');
include('../include/head.php');
?>
<body class="template-color-1">
    <div class="main-wrapper">
        <?php include('../include/header.php');?>

        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Compare Cars</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Compare Cars</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="sp-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="select-car" data-index="0">
                            <div class="select-car-card text-center">
                                <span class="plus-icon">+</span>
                                <p>Select Car</p>
                            </div>
                            <select class="form-control car-dropdown" style="display:none;">
                                <option value="">Select Car</option>
                                <?php
                                $sql = "SELECT id, vehicle_name FROM cars";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row['id'].'">'.$row['vehicle_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="select-car" data-index="1">
                            <div class="select-car-card text-center">
                                <span class="plus-icon">+</span>
                                <p>Select Car</p>
                            </div>
                            <select class="form-control car-dropdown" style="display:none;">
                                <option value="">Select Car</option>
                                <?php
                                $sql = "SELECT id, vehicle_name FROM cars";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row['id'].'">'.$row['vehicle_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="select-car" data-index="2">
                            <div class="select-car-card text-center">
                                <span class="plus-icon">+</span>
                                <p>Select Car</p>
                            </div>
                            <select class="form-control car-dropdown" style="display:none;">
                                <option value="">Select Car</option>
                                <?php
                                $sql = "SELECT id, vehicle_name FROM cars";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row['id'].'">'.$row['vehicle_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="select-car" data-index="3">
                            <div class="select-car-card text-center">
                                <span class="plus-icon">+</span>
                                <p>Select Car</p>
                            </div>
                            <select class="form-control car-dropdown" style="display:none;">
                                <option value="">Select Car</option>
                                <?php
                                $sql = "SELECT id, vehicle_name FROM cars";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row['id'].'">'.$row['vehicle_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 text-center">
                        <button type="button" id="compare-cars" class="btn btn-primary">Compare Cars</button>
                    </div>
                </div>
                <div class="row mt-4" id="compare-container">
                </div>
            </div>
        </div>

        <?php include('../include/footer.php');?>
    </div>
    <?php include('../include/foot.php');?>

    <style>
        .select-car-card {
            background: #f9f9f9;
            border: 1px dashed #ddd;
            padding: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .select-car-card:hover {
            background: #eee;
        }
        .select-car-card .plus-icon {
            font-size: 24px;
            color: #ff0000;
        }
        .select-car-card p {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        .car-dropdown {
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #ff0000;
            border-color: #ff0000;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #cc0000;
            border-color: #cc0000;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.select-car-card').click(function(){
            $(this).next('.car-dropdown').toggle();
        });

        $('.car-dropdown').change(function(){
            var index = $(this).closest('.select-car').data('index');
            var carId = $(this).val();
            if(carId){
                var selectedCars = JSON.parse(localStorage.getItem('selectedCars')) || [];
                selectedCars[index] = carId;
                localStorage.setItem('selectedCars', JSON.stringify(selectedCars));
            }
        });

        $('#compare-cars').click(function(){
            var selectedCars = JSON.parse(localStorage.getItem('selectedCars')) || [];
            if (selectedCars.length > 0) {
                $.ajax({
                    url: '../controller/compare_cars.php',
                    type: 'POST',
                    data: { car_ids: selectedCars },
                    success: function(response) {
                        var cars = JSON.parse(response);
                        var compareHtml = '';
                        compareHtml += '<table class="table table-bordered">';
                        compareHtml += '<thead><tr><th>Feature</th>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<th>' + cars[i].vehicle_name + '</th>';
                        }
                        compareHtml += '</tr></thead>';
                        compareHtml += '<tbody>';
                        compareHtml += '<tr><td>Brand</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].brand + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Vehicle Type</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].vehicle_type + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Fuel Tank Capacity</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].fuel_tank_capacity + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Engine</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].engine + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Height</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].height + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Width</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].width + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Length</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].length + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Wheel Base</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].wheel_base + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Kerb Weight</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].kerb_weight + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Gross Weight</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].gross_weight + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Transmission Type</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].transmission_type + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Drive Type</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].drive_type + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Torque</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].torque + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>RPM at Max Power</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].rpm_at_max_power + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>RPM at Max Torque</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].rpm_at_max_torque + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Number of Doors</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].no_of_doors + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Seating Capacity</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].seating_capacity + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Fuel Type</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].fuel_type + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Front Brake Type</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].front_brake_type + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Rear Brake Type</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].rear_brake_type + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Front Suspension</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].front_suspension + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Rear Suspension</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].rear_suspension + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Tyre Type</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].tyre_type + '</td>';
                        }
                        compareHtml += '</tr>';
                        compareHtml += '<tr><td>Tyre Size</td>';
                        for (var i = 0; i < cars.length; i++) {
                            compareHtml += '<td>' + cars[i].tyre_size + '</td>';
                        }
                        compareHtml += '</tr>';
                        // Add more rows as necessary for each feature
                        compareHtml += '</tbody></table>';
                        $('#compare-container').html(compareHtml);
                    }
                });
            } else {
                $('#compare-container').html('<p>No cars selected for comparison.</p>');
            }
        });
    });
    </script>
</body>
</html>

<?php 
$conn->close();
?>
