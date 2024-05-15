<?php
session_start(); // Start the session if you are using session variables
require_once 'config.php';  // Ensure this file contains the correct database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize the input using mysqli_real_escape_string to prevent SQL Injection
    $make = mysqli_real_escape_string($conn, $_POST['make']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $variant = mysqli_real_escape_string($conn, $_POST['variant']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $plate_number = mysqli_real_escape_string($conn, $_POST['plate_number']);
    $car_color = mysqli_real_escape_string($conn, $_POST['car_color']);
    $mileage = mysqli_real_escape_string($conn, $_POST['mileage']);
    $listingType = mysqli_real_escape_string($conn, $_POST['listingType']);
    
    // Handle file upload
    $fileNames = [];
    $uploadDirectory = 'uploads/'; // Ensure this directory exists and has appropriate permissions
    foreach ($_FILES['car_images']['name'] as $key => $value) {
        $targetFilePath = $uploadDirectory . basename($_FILES['car_images']['name'][$key]);
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        
        if (move_uploaded_file($_FILES['car_images']['tmp_name'][$key], $targetFilePath)) {
            $fileNames[] = $targetFilePath; // Add file name to the array
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Convert filenames array to JSON
    $fileNamesJson = json_encode($fileNames);

    // SQL Query to insert data into the database
    $list_car = "INSERT INTO `car_list` (`lister`, `make`, `model`, `year`, `variant`, `color`, `plate_number`, `car_color`, `mileage`, `transaction_type`, `image_paths`) 
 VALUES ('{$_SESSION['user_id']}', '$make', '$model', '$year', '$variant', '$color', '$plate_number', '$car_color', '$mileage', '$listingType', '$fileNamesJson')";

    // Execute the query
    if ($conn->query($list_car) === TRUE) {
        header('Location: ../pages/homepage.php'); // Redirect to homepage after insertion
        exit(); // Make sure that no more code is executed after the redirect
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
