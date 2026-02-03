<?php
include 'db.php';

// Fetch statistics from the database
$donorsQuery = "SELECT COUNT(*) AS TotalDonors FROM Donor";
$donorsResult = mysqli_query($conn, $donorsQuery);
$totalDonors = mysqli_fetch_assoc($donorsResult)['TotalDonors'];

$recipientsQuery = "SELECT COUNT(*) AS TotalRecipients FROM Recipient";
$recipientsResult = mysqli_query($conn, $recipientsQuery);
$totalRecipients = mysqli_fetch_assoc($recipientsResult)['TotalRecipients'];

$bloodUnitsQuery = "SELECT SUM(QuantityAvailable) AS TotalBloodUnits FROM BloodSample";
$bloodUnitsResult = mysqli_query($conn, $bloodUnitsQuery);
$totalBloodUnits = mysqli_fetch_assoc($bloodUnitsResult)['TotalBloodUnits'];

$hospitalsQuery = "SELECT COUNT(*) AS TotalHospitals FROM Hospital";
$hospitalsResult = mysqli_query($conn, $hospitalsQuery);
$totalHospitals = mysqli_fetch_assoc($hospitalsResult)['TotalHospitals'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="admin.css" />
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="logo.jpeg" alt="Blood Bank Logo" />
            <h2>Admin Dashboard</h2>
        </div>
        <ul class="sidebar-links">
            <li><a href="admin.php">🏠 Home</a></li>
            <li><a href="managedonor.php">🩸 Manage Donors</a></li>
            <li><a href="managerecipient.php">🧑‍🤝‍🧑 Manage Recipients</a></li>
            <li><a href="requestmanage.php">🗃️ Manage Requests</a></li>
            <li><a href="report.php">📊 Reports & Analytics</a></li>
            <li><a href="inventory.php">🩺 Blood Inventory</a></li>
            <li><a href="donation.php">🩸 Filter Donations</a></li>
            <li><a href="#">⚙️ Settings</a></li>
            <!-- Logout Button -->
            <li><a href="index.php" class="logout-btn">🚪 Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="dashboard-header">
            <h1>Welcome, Admin</h1>
        </header>

        <!-- Statistics Section -->
        <section class="stats">
            <div class="stat-card">
                <h3><?= $totalDonors ?></h3>
                <p>Registered Donors</p>
            </div>
            <div class="stat-card">
                <h3><?= $totalRecipients ?></h3>
                <p>Recipients Helped</p>
            </div>
            <div class="stat-card">
                <h3><?= $totalBloodUnits ?: 0 ?></h3>
                <p>Blood Units Collected</p>
            </div>
            <div class="stat-card">
                <h3><?= $totalHospitals ?></h3>
                <p>Hospitals Connected</p>
            </div>
        </section>
    </div>
</body>
</html>