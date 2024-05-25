<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = intval($_POST['car_id']);
    $review_text = $conn->real_escape_string($_POST['review_text']);

    $sql = "INSERT INTO reviews (car_id, review_text) VALUES ('$car_id', '$review_text')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Review added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }

    $conn->close();
}
?>
