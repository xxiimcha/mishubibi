<?php
include('../controller/config.php');

// File upload configuration
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["car_image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["car_image"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
    echo json_encode(["status" => "error", "message" => "File is not an image."]);
    exit;
}

// Allow certain file formats
$allowed_file_types = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowed_file_types)) {
    $uploadOk = 0;
    echo json_encode(["status" => "error", "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
    exit;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo json_encode(["status" => "error", "message" => "Sorry, your file was not uploaded."]);
    exit;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
        // Collect form data
        $fuel_tank_capacity = $_POST['fuel_tank_capacity'];
        $rear_tread = $_POST['rear_tread'];
        $gross_weight = $_POST['gross_weight'];
        $width = $_POST['width'];
        $wheel_base = $_POST['wheel_base'];
        $turning_radius = $_POST['turning_radius'];
        $seating_capacity = $_POST['seating_capacity'];
        $front_tread = $_POST['front_tread'];
        $kerb_weight = $_POST['kerb_weight'];
        $length = $_POST['length'];
        $height = $_POST['height'];
        $ground_clearance = $_POST['ground_clearance'];
        $no_of_doors = $_POST['no_of_doors'];
        $payload_capacity = $_POST['payload_capacity'];
        $engine = $_POST['engine'];
        $fuel_supply_system = $_POST['fuel_supply_system'];
        $no_of_cylinders = $_POST['no_of_cylinders'];
        $valves_per_cylinder = $_POST['valves_per_cylinder'];
        $valve_configuration = $_POST['valve_configuration'];
        $fuel_type = $_POST['fuel_type'];
        $engine_displacement = $_POST['engine_displacement'];
        $power = $_POST['power'];
        $torque = $_POST['torque'];
        $rpm_at_max_power = $_POST['rpm_at_max_power'];
        $rpm_at_max_torque = $_POST['rpm_at_max_torque'];
        $power_steering = $_POST['power_steering'];
        $adjustable_steering_column = $_POST['adjustable_steering_column'];
        $steering_type = $_POST['steering_type'];
        $steering_gear_type = $_POST['steering_gear_type'];
        $front_brake_type = $_POST['front_brake_type'];
        $rear_brake_type = $_POST['rear_brake_type'];
        $front_suspension = $_POST['front_suspension'];
        $rear_suspension = $_POST['rear_suspension'];
        $transmission_type = $_POST['transmission_type'];
        $gear_box = $_POST['gear_box'];
        $drive_type = $_POST['drive_type'];
        $steering_wheel_gearshift_paddle = $_POST['steering_wheel_gearshift_paddle'];
        $alloy_wheels = $_POST['alloy_wheels'];
        $wheel_covers = $_POST['wheel_covers'];
        $alloy_wheel_size = $_POST['alloy_wheel_size'];
        $tyre_size = $_POST['tyre_size'];
        $tyre_type = $_POST['tyre_type'];
        $spare_tyre_size = $_POST['spare_tyre_size'];
        $spare_tyre_material = $_POST['spare_tyre_material'];

        // Insert data into the database
        $sql = "INSERT INTO cars (
            fuel_tank_capacity, rear_tread, gross_weight, width, wheel_base, turning_radius, seating_capacity,
            front_tread, kerb_weight, length, height, ground_clearance, no_of_doors, payload_capacity,
            engine, fuel_supply_system, no_of_cylinders, valves_per_cylinder, valve_configuration,
            fuel_type, engine_displacement, power, torque, rpm_at_max_power, rpm_at_max_torque,
            power_steering, adjustable_steering_column, steering_type, steering_gear_type, front_brake_type,
            rear_brake_type, front_suspension, rear_suspension, transmission_type, gear_box, drive_type,
            steering_wheel_gearshift_paddle, alloy_wheels, wheel_covers, alloy_wheel_size, tyre_size, tyre_type,
            spare_tyre_size, spare_tyre_material, car_image
        ) VALUES (
            '$fuel_tank_capacity', '$rear_tread', '$gross_weight', '$width', '$wheel_base', '$turning_radius', '$seating_capacity',
            '$front_tread', '$kerb_weight', '$length', '$height', '$ground_clearance', '$no_of_doors', '$payload_capacity',
            '$engine', '$fuel_supply_system', '$no_of_cylinders', '$valves_per_cylinder', '$valve_configuration',
            '$fuel_type', '$engine_displacement', '$power', '$torque', '$rpm_at_max_power', '$rpm_at_max_torque',
            '$power_steering', '$adjustable_steering_column', '$steering_type', '$steering_gear_type', '$front_brake_type',
            '$rear_brake_type', '$front_suspension', '$rear_suspension', '$transmission_type', '$gear_box', '$drive_type',
            '$steering_wheel_gearshift_paddle', '$alloy_wheels', '$wheel_covers', '$alloy_wheel_size', '$tyre_size', '$tyre_type',
            '$spare_tyre_size', '$spare_tyre_material', '$target_file'
        )";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Car details submitted successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
        }

        // Close the connection
        $conn->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Sorry, there was an error uploading your file."]);
    }
}
?>
