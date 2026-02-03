<?php
include 'db.php';

if (isset($_GET['id'])) {
    $recipientId = intval($_GET['id']);
    $deleteQuery = "DELETE FROM Recipient WHERE RecipientID = $recipientId";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: recipientManage.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
