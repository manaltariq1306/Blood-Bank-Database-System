<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve request ID and new status from the AJAX request
    $requestId = $_POST['id'];
    $newStatus = $_POST['status'];

    // Sanitize inputs to prevent SQL injection
    $requestId = mysqli_real_escape_string($conn, $requestId);
    $newStatus = mysqli_real_escape_string($conn, $newStatus);

    // Update query
    $updateQuery = "UPDATE Request SET RequestStatus = '$newStatus' WHERE RequestID = $requestId";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
