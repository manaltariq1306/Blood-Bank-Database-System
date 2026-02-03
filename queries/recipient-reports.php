<?php
include '../db.php';

$reportType = $_GET['report'];

if ($reportType === 'all-transcripts') {
    $query = "SELECT R.RecipientID, R.FirstName, R.LastName, R.BloodType, R.ContactNumber, R.DateOfBirth, R.Gender, 
              H.HospitalName, A.Area AS AddressArea, A.City AS AddressCity, RE.RequestID, RE.DateOfRequest, RE.QuantityRequested, 
              RE.RequestStatus, RE.RequestPriority, BT.TransfusionID, BT.DateOfTransfusion, BT.QuantityTransfused, 
              BS.SampleID, BS.ExpirationDate 
              FROM Recipient R 
              LEFT JOIN Hospital H ON R.HospitalID = H.HospitalID 
              LEFT JOIN Address A ON R.RecipientID = A.RecipientID 
              LEFT JOIN Request RE ON R.RecipientID = RE.RecipientID 
              LEFT JOIN BloodTransfusion BT ON RE.RequestID = BT.RequestID 
              LEFT JOIN BloodSample BS ON BT.SampleID = BS.SampleID 
              ORDER BY R.RecipientID";

} elseif ($reportType === 'enrollment-per-hospital') {
    $query = "SELECT H.HospitalName, H.ContactNumber AS HospitalContactNumber, R.RecipientID, R.FirstName, R.LastName, R.BloodType, 
                     R.ContactNumber AS RecipientContactNumber, R.DateOfBirth, R.Gender 
              FROM Hospital H 
              INNER JOIN Recipient R ON H.HospitalID = R.HospitalID 
              ORDER BY H.HospitalName, R.LastName, R.FirstName";
}

if (isset($query)) {
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        // Generate column headers dynamically
        $columns = array_keys($result->fetch_assoc());
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<th>" . $column . "</th>";
        }
        echo "</tr>";

        $result->data_seek(0); // Reset pointer for data fetch
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
} else {
    echo "Invalid report type.";
}

$conn->close();
?>
