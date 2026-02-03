<?php
include '../db.php';

$reportType = $_GET['report'];

if ($reportType === 'monthly-overview') {
    $query = "SELECT MONTHNAME(d.DateOfDonation) AS Month, YEAR(d.DateOfDonation) AS Year, 
                     GROUP_CONCAT(CONCAT(do.FirstName, ' ', do.LastName, ' (', do.BloodType, ')')) AS DonorsAndBloodTypes, 
                     SUM(d.Quantity) AS TotalQuantityDonated 
              FROM Donation d 
              JOIN Donor do ON d.DonorID = do.DonorID 
              GROUP BY YEAR(d.DateOfDonation), MONTH(d.DateOfDonation) 
              ORDER BY YEAR(d.DateOfDonation), MONTH(d.DateOfDonation)";
} elseif ($reportType === 'collection-trends') {
    $query = "SELECT do.BloodType, YEAR(d.DateOfDonation) AS Year, SUM(d.Quantity) AS TotalQuantityCollected 
              FROM Donation d 
              JOIN Donor do ON d.DonorID = do.DonorID 
              GROUP BY do.BloodType, YEAR(d.DateOfDonation) 
              ORDER BY YEAR(d.DateOfDonation), do.BloodType";
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
