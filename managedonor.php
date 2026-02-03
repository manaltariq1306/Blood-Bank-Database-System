<?php
include 'db.php';

// Fetch all donors for initial display
$allDonorsQuery = "SELECT * FROM donor";
$allDonorsResult = mysqli_query($conn, $allDonorsQuery);

// Fetch distinct areas for dropdown
$areasQuery = "SELECT DISTINCT Area FROM Address";
$areasResult = mysqli_query($conn, $areasQuery);

// Initialize search result variables
$searchResults = [];
$isSearch = false;

// Handle search request
if (isset($_POST['search'])) {
    $isSearch = true;
    $bloodType = $_POST['blood-type'];
    $area = $_POST['area'];

    if (!empty($bloodType)) {
        $searchQuery = "SELECT DonorID, FirstName, LastName, BloodType FROM Donor WHERE BloodType = '$bloodType'";
    } elseif (!empty($area)) {
        $searchQuery = "SELECT d.DonorID, d.FirstName, d.LastName, a.Area 
                        FROM Donor d 
                        JOIN Address a ON d.DonorID = a.DonorID 
                        WHERE a.Area = '$area'";
    } else {
        $searchQuery = $allDonorsQuery; // Default to fetching all donors if no filters
    }

    $searchResults = mysqli_query($conn, $searchQuery);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Management - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>Donor Management</h1>
            <p>Search, edit, or delete donor records as needed.</p>
        </header>

        <!-- Search Section -->
        <section class="search-section">
            <h2>Search Donors</h2>
            <form id="searchForm" method="POST" action="">
                <div class="search-group">
                    <label for="area">Search by Area:</label>
                    <select id="area" name="area">
                        <option value="">-- Select Area --</option>
                        <?php while ($row = mysqli_fetch_assoc($areasResult)) { ?>
                            <option value="<?= $row['Area']; ?>"><?= $row['Area']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="search-group">
                    <label for="blood-type">Search by Blood Type:</label>
                    <select id="blood-type" name="blood-type">
                        <option value="">-- Select Blood Type --</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
                <button type="submit" class="search-btn" name="search">Search</button>
            </form>
        </section>

        <!-- Search Results -->
        <?php if ($isSearch && $searchResults && mysqli_num_rows($searchResults) > 0): ?>
        <section class="search-results">
            <h2>Search Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th><?= !empty($bloodType) ? 'Blood Type' : 'Area'; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($searchResults)) { ?>
                        <tr>
                            <td><?= $row['DonorID']; ?></td>
                            <td><?= $row['FirstName']; ?></td>
                            <td><?= $row['LastName']; ?></td>
                            <td><?= !empty($bloodType) ? $row['BloodType'] : $row['Area']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <?php elseif ($isSearch): ?>
        <p>No results found for your search criteria.</p>
        <?php endif; ?>

        <!-- Full Donor Table -->
        <section class="donor-list">
            <h2>All Donor Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Blood Type</th>
                        <th>Health Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($allDonorsResult)) { ?>
                        <tr>
                            <td><?= $row['DonorID']; ?></td>
                            <td><?= $row['FirstName']; ?></td>
                            <td><?= $row['LastName']; ?></td>
                            <td><?= $row['DateOfBirth']; ?></td>
                            <td><?= $row['Gender']; ?></td>
                            <td><?= $row['ContactNumber']; ?></td>
                            <td><?= $row['Email']; ?></td>
                            <td><?= $row['BloodType']; ?></td>
                            <td><?= $row['HealthStatus']; ?></td>
                            <td>
                                <button class="edit-btn" onclick="editDonor(<?= $row['DonorID']; ?>)">Edit</button>
                                <button class="delete-btn" onclick="deleteDonor(<?= $row['DonorID']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>

    <script>
        // Delete functionality
        function deleteDonor(donorId) {
            if (confirm("Are you sure you want to delete this donor?")) {
                window.location.href = `deleteDonor.php?id=${donorId}`;
            }
        }

        // Edit functionality
        function editDonor(donorId) {
            window.location.href = `editDonor.php?id=${donorId}`;
        }
    </script>
</body>
</html>
