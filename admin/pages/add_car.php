<?php include('../include/head.php');?>

<body class="sb-nav-fixed">
    <?php include('../include/nav.php');?>
    <div id="layoutSidenav">
        <?php include('../include/side.php');?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4 mt-4">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Cars</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-plus-circle me-1"></i>
                            Add New Car
                        </div>
                        <div class="card-body">
                            <div id="message"></div>
                            <form id="carForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="vehicleName" class="form-label">Vehicle Name</label>
                                    <input type="text" class="form-control" id="vehicleName" name="vehicle_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="brand" class="form-label">Brand</label>
                                    <input type="text" class="form-control" id="brand" name="brand" required>
                                </div>
                                <div class="mb-3">
                                    <label for="vehicleType" class="form-label">Vehicle Type</label>
                                    <select class="form-control" id="vehicleType" name="vehicle_type" required>
                                        <option value="cars">Cars</option>
                                        <option value="motor">Motorcycles</option>
                                        <option value="trucks">Trucks</option>
                                        <option value="three">Three Wheelers</option>
                                        <option value="electric">Electric</option>
                                    </select>
                                </div>
                                <ul class="nav nav-tabs" id="carSpecsTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="dimensions-tab" data-bs-toggle="tab" data-bs-target="#dimensions" type="button" role="tab" aria-controls="dimensions" aria-selected="true">Dimensions & Capacity</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="engine-tab" data-bs-toggle="tab" data-bs-target="#engine" type="button" role="tab" aria-controls="engine" aria-selected="false">Engine Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="performance-tab" data-bs-toggle="tab" data-bs-target="#performance" type="button" role="tab" aria-controls="performance" aria-selected="false">Performance</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steering-tab" data-bs-toggle="tab" data-bs-target="#steering" type="button" role="tab" aria-controls="steering" aria-selected="false">Steering</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="suspension-tab" data-bs-toggle="tab" data-bs-target="#suspension" type="button" role="tab" aria-controls="suspension" aria-selected="false">Suspension & Brakes</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="transmission-tab" data-bs-toggle="tab" data-bs-target="#transmission" type="button" role="tab" aria-controls="transmission" aria-selected="false">Transmission</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="wheels-tab" data-bs-toggle="tab" data-bs-target="#wheels" type="button" role="tab" aria-controls="wheels" aria-selected="false">Wheel & Tyre</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="carSpecsTabsContent">
                                    <div class="tab-pane fade show active" id="dimensions" role="tabpanel" aria-labelledby="dimensions-tab">
                                        <div class="mb-3 mt-3">
                                            <label for="fuelTankCapacity" class="form-label">Fuel Tank Capacity (litres)</label>
                                            <input type="text" class="form-control" id="fuelTankCapacity" name="fuel_tank_capacity" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rearTread" class="form-label">Rear Tread</label>
                                            <input type="text" class="form-control" id="rearTread" name="rear_tread" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="grossWeight" class="form-label">Gross Weight</label>
                                            <input type="text" class="form-control" id="grossWeight" name="gross_weight" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="width" class="form-label">Width</label>
                                            <input type="text" class="form-control" id="width" name="width" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="wheelBase" class="form-label">Wheel Base</label>
                                            <input type="text" class="form-control" id="wheelBase" name="wheel_base" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="turningRadius" class="form-label">Turning Radius</label>
                                            <input type="text" class="form-control" id="turningRadius" name="turning_radius" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="seatingCapacity" class="form-label">Seating Capacity</label>
                                            <input type="text" class="form-control" id="seatingCapacity" name="seating_capacity" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="frontTread" class="form-label">Front Tread</label>
                                            <input type="text" class="form-control" id="frontTread" name="front_tread" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kerbWeight" class="form-label">Kerb Weight</label>
                                            <input type="text" class="form-control" id="kerbWeight" name="kerb_weight" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="length" class="form-label">Length</label>
                                            <input type="text" class="form-control" id="length" name="length" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="height" class="form-label">Height</label>
                                            <input type="text" class="form-control" id="height" name="height" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="groundClearance" class="form-label">Ground Clearance</label>
                                            <input type="text" class="form-control" id="groundClearance" name="ground_clearance" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="noOfDoors" class="form-label">Number Of Doors</label>
                                            <input type="text" class="form-control" id="noOfDoors" name="no_of_doors" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="payloadCapacity" class="form-label">Payload Capacity</label>
                                            <input type="text" class="form-control" id="payloadCapacity" name="payload_capacity" required>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="engine" role="tabpanel" aria-labelledby="engine-tab">
                                        <div class="mb-3 mt-3">
                                            <label for="engine" class="form-label">Engine</label>
                                            <input type="text" class="form-control" id="engine" name="engine" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fuelSupplySystem" class="form-label">Fuel Supply System</label>
                                            <input type="text" class="form-control" id="fuelSupplySystem" name="fuel_supply_system" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="noOfCylinders" class="form-label">Number Of Cylinders</label>
                                            <input type="text" class="form-control" id="noOfCylinders" name="no_of_cylinders" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="valvesPerCylinder" class="form-label">Valves Per Cylinder</label>
                                            <input type="text" class="form-control" id="valvesPerCylinder" name="valves_per_cylinder" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="valveConfiguration" class="form-label">Valve Configuration</label>
                                            <input type="text" class="form-control" id="valveConfiguration" name="valve_configuration" required>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="performance" role="tabpanel" aria-labelledby="performance-tab">
                                        <div class="mb-3 mt-3">
                                            <label for="fuelType" class="form-label">Fuel Type</label>
                                            <input type="text" class="form-control" id="fuelType" name="fuel_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="engineDisplacement" class="form-label">Engine Displacement</label>
                                            <input type="text" class="form-control" id="engineDisplacement" name="engine_displacement" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="power" class="form-label">Power</label>
                                            <input type="text" class="form-control" id="power" name="power" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="torque" class="form-label">Torque</label>
                                            <input type="text" class="form-control" id="torque" name="torque" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rpmAtMaxPower" class="form-label">RPM At Max Power</label>
                                            <input type="text" class="form-control" id="rpmAtMaxPower" name="rpm_at_max_power" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rpmAtMaxTorque" class="form-label">RPM At Max Torque</label>
                                            <input type="text" class="form-control" id="rpmAtMaxTorque" name="rpm_at_max_torque" required>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="steering" role="tabpanel" aria-labelledby="steering-tab">
                                        <div class="mb-3 mt-3">
                                            <label for="powerSteering" class="form-label">Power Steering</label>
                                            <input type="text" class="form-control" id="powerSteering" name="power_steering" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="adjustableSteeringColumn" class="form-label">Adjustable Steering Column</label>
                                            <input type="text" class="form-control" id="adjustableSteeringColumn" name="adjustable_steering_column" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="steeringType" class="form-label">Steering Type</label>
                                            <input type="text" class="form-control" id="steeringType" name="steering_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="steeringGearType" class="form-label">Steering Gear Type</label>
                                            <input type="text" class="form-control" id="steeringGearType" name="steering_gear_type" required>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="suspension" role="tabpanel" aria-labelledby="suspension-tab">
                                        <div class="mb-3 mt-3">
                                            <label for="frontBrakeType" class="form-label">Front Brake Type</label>
                                            <input type="text" class="form-control" id="frontBrakeType" name="front_brake_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rearBrakeType" class="form-label">Rear Brake Type</label>
                                            <input type="text" class="form-control" id="rearBrakeType" name="rear_brake_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="frontSuspension" class="form-label">Front Suspension</label>
                                            <input type="text" class="form-control" id="frontSuspension" name="front_suspension" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rearSuspension" class="form-label">Rear Suspension</label>
                                            <input type="text" class="form-control" id="rearSuspension" name="rear_suspension" required>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="transmission" role="tabpanel" aria-labelledby="transmission-tab">
                                        <div class="mb-3 mt-3">
                                            <label for="transmissionType" class="form-label">Transmission Type</label>
                                            <input type="text" class="form-control" id="transmissionType" name="transmission_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gearBox" class="form-label">Gear Box</label>
                                            <input type="text" class="form-control" id="gearBox" name="gear_box" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="driveType" class="form-label">Drive Type</label>
                                            <input type="text" class="form-control" id="driveType" name="drive_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="steeringWheelGearshiftPaddle" class="form-label">Steering Wheel Gearshift Paddle</label>
                                            <input type="text" class="form-control" id="steeringWheelGearshiftPaddle" name="steering_wheel_gearshift_paddle" required>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="wheels" role="tabpanel" aria-labelledby="wheels-tab">
                                        <div class="mb-3 mt-3">
                                            <label for="alloyWheels" class="form-label">Alloy Wheels</label>
                                            <input type="text" class="form-control" id="alloyWheels" name="alloy_wheels" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="wheelCovers" class="form-label">Wheel Covers</label>
                                            <input type="text" class="form-control" id="wheelCovers" name="wheel_covers" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alloyWheelSize" class="form-label">Alloy Wheel Size</label>
                                            <input type="text" class="form-control" id="alloyWheelSize" name="alloy_wheel_size" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tyreSize" class="form-label">Tyre Size</label>
                                            <input type="text" class="form-control" id="tyreSize" name="tyre_size" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tyreType" class="form-label">Tyre Type</label>
                                            <input type="text" class="form-control" id="tyreType" name="tyre_type" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="spareTyreSize" class="form-label">Spare Tyre Size</label>
                                            <input type="text" class="form-control" id="spareTyreSize" name="spare_tyre_size" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="spareTyreMaterial" class="form-label">Spare Tyre Material</label>
                                            <input type="text" class="form-control" id="spareTyreMaterial" name="spare_tyre_material" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="carImage" class="form-label mt-3">Car Image</label>
                                    <input type="file" class="form-control" id="carImage" name="car_image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#carForm').on('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'process_car.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        $('#message').html('<div class="alert alert-success" role="alert">' + response.message + '</div>');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#message').html('<div class="alert alert-danger" role="alert">An error occurred while submitting the form. Please try again.</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
