<?php
include '../db.php';

$query = "SELECT bt.TransfusionID, bt.DateOfTransfusion, bs.SampleID, bs.ExpirationDate, 
                 CASE 
                     WHEN bt.DateOfTransfusion <= bs.ExpirationDate THEN 'Valid' 
                     ELSE 'Expired' 
                 END AS ExpirationStatus 
          FROM BloodTransfusion bt 
          JOIN BloodSample bs ON bt.SampleID = bs.SampleID 
          ORDER BY bt.DateOfTransfusion";

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
