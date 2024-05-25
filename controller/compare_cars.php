<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_ids = $_POST['car_ids'];
    $car_ids = implode(',', array_map('intval', $car_ids));

    $sql = "SELECT * FROM cars WHERE id IN ($car_ids)";
    $result = $conn->query($sql);

    $cars = [];
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }

    echo json_encode($cars);
    $conn->close();
}
?>
