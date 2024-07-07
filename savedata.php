<?php
// Include your database connection file
include('dbconnect.php');

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the POST request
    $origin = $_POST["from"];
    $destination = $_POST["to"];
    $distance = $_POST["distance"];
    $duration = $_POST["duration"];
    $total_fare = $_POST["total_fare"];

    // Insert data into the database
    $query = "INSERT INTO ride_details (origin, destination, distance, duration, total_fare) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdss", $origin, $destination, $distance, $duration, $total_fare);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data stored successfully.";
    } else {
        echo "Error storing data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    
    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>