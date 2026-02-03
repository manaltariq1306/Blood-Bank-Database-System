<?php
include '../db.php';

$reportType = $_GET['report'];

if ($reportType === 'blood-request-overview') {
    $query = "SELECT MONTHNAME(r.DateOfRequest) AS Month, YEAR(r.DateOfRequest) AS Year, 
                     COUNT(r.RequestID) AS NumberOfRequests, 
                     GROUP_CONCAT(CONCAT(rec.FirstName, ' ', rec.LastName, ' (', r.BloodType, ')')) AS RecipientsAndBloodTypes 
              FROM Request r 
              JOIN Recipient rec ON r.RecipientID = rec.RecipientID 
              GROUP BY YEAR(r.DateOfRequest), MONTH(r.DateOfRequest) 
              ORDER BY YEAR(r.DateOfRequest), MONTH(r.DateOfRequest)";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
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

$conn->close();
?>
