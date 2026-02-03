<?php
include '../db.php';

$reportType = $_GET['report'];

if ($reportType === 'contribution-summary') {
    $query = "SELECT D.DonorID, D.FirstName AS DonorFirstName, D.LastName AS DonorLastName, D.BloodType, DN.DonationID, DN.DateOfDonation, DN.Quantity AS QuantityDonated
              FROM Donor D 
              INNER JOIN Donation DN ON D.DonorID = DN.DonorID 
              ORDER BY D.DonorID, DN.DateOfDonation";
} elseif ($reportType === 'annual-donation-count') {
    $query = "SELECT MONTHNAME(DateOfDonation) AS Month, YEAR(DateOfDonation) AS Year, COUNT(*) AS NumberOfDonations 
              FROM Donation 
              GROUP BY YEAR(DateOfDonation), MONTH(DateOfDonation) 
              ORDER BY YEAR(DateOfDonation), MONTH(DateOfDonation)";
} elseif ($reportType === 'trends-by-blood-type') {
    $query = "SELECT MONTHNAME(d.DateOfDonation) AS Month, YEAR(d.DateOfDonation) AS Year, do.FirstName AS DonorFirstName, do.LastName AS DonorLastName, do.BloodType AS BloodType 
              FROM Donation d 
              JOIN Donor do ON d.DonorID = do.DonorID 
              ORDER BY YEAR(d.DateOfDonation), MONTH(d.DateOfDonation)";
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
