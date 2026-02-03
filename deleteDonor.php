<?php
include 'db.php';

if (isset($_GET['id'])) {
    $donorId = intval($_GET['id']);
    $deleteQuery = "DELETE FROM Donor WHERE DonorID = $donorId";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: managedonor.php"); // Redirect back to the main page
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
