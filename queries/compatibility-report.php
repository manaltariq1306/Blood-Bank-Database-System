<?php
include '../db.php';

$query = "SELECT BT.TransfusionID, R.RecipientID, R.FirstName AS RecipientFirstName, R.LastName AS RecipientLastName, 
                 R.BloodType AS RecipientBloodType, BS.SampleID, BS.BloodType AS SampleBloodType, 
                 CASE 
                     WHEN (R.BloodType LIKE 'O%' AND BS.BloodType LIKE 'O%') OR 
                          (R.BloodType LIKE 'A%' AND (BS.BloodType LIKE 'A%' OR BS.BloodType LIKE 'O%')) OR 
                          (R.BloodType LIKE 'B%' AND (BS.BloodType LIKE 'B%' OR BS.BloodType LIKE 'O%')) OR 
                          (R.BloodType LIKE 'AB%' AND (BS.BloodType LIKE 'A%' OR BS.BloodType LIKE 'B%' OR BS.BloodType LIKE 'O%' OR BS.BloodType LIKE 'AB%')) 
                          THEN 'Compatible' 
                     ELSE 'Incompatible' 
                 END AS Compatibility 
          FROM BloodTransfusion BT 
          INNER JOIN Recipient R ON BT.RecipientID = R.RecipientID 
          INNER JOIN BloodSample BS ON BT.SampleID = BS.SampleID 
          ORDER BY BT.TransfusionID";

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
