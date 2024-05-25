<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = intval($_POST['car_id']);

    $sql = "SELECT * FROM reviews WHERE car_id = $car_id ORDER BY date_created DESC";
    $result = $conn->query($sql);

    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }

    echo json_encode($reviews);
    $conn->close();
}
?>
