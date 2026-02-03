<?php
include 'db.php';

// Fetch overall blood inventory review
$overallQuery = "
    SELECT 
        bs.BloodType, 
        bs.RhFactor, 
        GROUP_CONCAT(DISTINCT DATE_FORMAT(d.DateOfDonation, '%b') ORDER BY MONTH(d.DateOfDonation)) AS DonationMonths,
        COUNT(*) AS TotalSamples
    FROM BloodSample bs
    JOIN Donation d ON bs.DonationID = d.DonationID
    GROUP BY bs.BloodType, bs.RhFactor
    ORDER BY bs.BloodType, bs.RhFactor;
";
$overallResult = mysqli_query($conn, $overallQuery);

// Initialize search results for blood collected by month
$searchResults = [];
$isSearch = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $month = intval($_POST['month']);
    $year = intval($_POST['year']);

    if ($month && $year) {
        $searchQuery = "
            SELECT 
                DATE_FORMAT(d.DateOfDonation, '%b %Y') AS DonationMonth,
                bs.BloodType, 
                bs.RhFactor,
                SUM(bs.QuantityAvailable) AS TotalStockCollected
            FROM BloodSample bs
            JOIN Donation d ON bs.DonationID = d.DonationID
            WHERE MONTH(d.DateOfDonation) = $month AND YEAR(d.DateOfDonation) = $year
            GROUP BY bs.BloodType, bs.RhFactor
            ORDER BY bs.BloodType, bs.RhFactor;
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
    <title>Blood Inventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>Blood Inventory</h1>
            <p>Overview and analysis of blood inventory and donations.</p>
        </header>

        <!-- Overall Review Section -->
        <section class="overall-review">
            <h2>Overall Blood Inventory Review</h2>
            <table>
                <thead>
                    <tr>
                        <th>Blood Type</th>
                        <th>Rh Factor</th>
                        <th>Donation Months</th>
                        <th>Total Samples</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($overallResult)) { ?>
                        <tr>
                            <td><?= $row['BloodType']; ?></td>
                            <td><?= $row['RhFactor']; ?></td>
                            <td><?= $row['DonationMonths']; ?></td>
                            <td><?= $row['TotalSamples']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- Filter by Month Section -->
        <section class="filter-section">
            <h2>Search Blood Collected by Month</h2>
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
            <h2>Blood Collected for Selected Month</h2>
            <table>
                <thead>
                    <tr>
                        <th>Donation Month</th>
                        <th>Blood Type</th>
                        <th>Rh Factor</th>
                        <th>Total Stock Collected</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($searchResults)) { ?>
                        <tr>
                            <td><?= $row['DonationMonth']; ?></td>
                            <td><?= $row['BloodType']; ?></td>
                            <td><?= $row['RhFactor']; ?></td>
                            <td><?= $row['TotalStockCollected']; ?></td>
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
