<?php
include 'db.php';

// Initialize search results for filtered donations
$searchResults = [];
$isSearch = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $month = intval($_POST['month']);
    $year = intval($_POST['year']);

    if ($month && $year) {
        $searchQuery = "
            SELECT 
                d.DonationID, 
                dr.FirstName, 
                dr.LastName, 
                dr.BloodType,
                d.DateOfDonation AS DonationDate,
                bs.SampleID,
                bs.ExpirationDate,
                d.Quantity
            FROM Donation d
            JOIN Donor dr ON d.DonorID = dr.DonorID
            JOIN BloodSample bs ON d.DonationID = bs.DonationID
            WHERE MONTH(d.DateOfDonation) = $month AND YEAR(d.DateOfDonation) = $year
            ORDER BY d.DateOfDonation;
        ";
        $searchResults = mysqli_query($conn, $searchQuery);
        $isSearch = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Donations</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="donation.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>Filter Donations</h1>
           
        </header>

        <!-- Filter Section -->
        <section class="filter-section">
            <h2>Search Donations by Month</h2>
            <form method="POST" action="">
                <div class="filter-group">
                    <label for="month">Select Month:</label>
                    <select id="month" name="month" required>
                        <option value="">-- Select Month --</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="year">Select Year:</label>
                    <input type="number" id="year" name="year" placeholder="Enter year (e.g., 2024)" required>
                </div>
                <button type="submit" class="filter-btn">Search</button>
            </form>
        </section>

        <!-- Search Results -->
        <?php if ($isSearch && $searchResults && mysqli_num_rows($searchResults) > 0): ?>
        <section class="search-results">
            <h2>Donations for Selected Month</h2>
            <table>
                <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>Donor Name</th>
                        <th>Blood Type</th>
                        <th>Donation Date</th>
                        <th>Sample ID</th>
                        <th>Expiration Date</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($searchResults)) { ?>
                        <tr>
                            <td><?= $row['DonationID']; ?></td>
                            <td><?= $row['FirstName'] . ' ' . $row['LastName']; ?></td>
                            <td><?= $row['BloodType']; ?></td>
                            <td><?= $row['DonationDate']; ?></td>
                            <td><?= $row['SampleID']; ?></td>
                            <td><?= $row['ExpirationDate']; ?></td>
                            <td><?= $row['Quantity']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <?php elseif ($isSearch): ?>
        <p>No data found for the selected month and year.</p>
        <?php endif; ?>
    </div>
</body>
</html>
