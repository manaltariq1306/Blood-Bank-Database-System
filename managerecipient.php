<?php
include 'db.php';

// Fetch all recipients for initial display
$allRecipientsQuery = "SELECT * FROM Recipient";
$allRecipientsResult = mysqli_query($conn, $allRecipientsQuery);

// Fetch distinct areas for dropdown
$areasQuery = "SELECT DISTINCT Area FROM Address";
$areasResult = mysqli_query($conn, $areasQuery);

// Initialize search results
$searchResults = [];
$isSearch = false;

// Handle search request
if (isset($_POST['search'])) {
    $isSearch = true;
    $bloodType = $_POST['blood-type'];
    $area = $_POST['area'];

    if (!empty($bloodType)) {
        $searchQuery = "SELECT RecipientID, FirstName, LastName, BloodType, ContactNumber 
                        FROM Recipient 
                        WHERE BloodType = '$bloodType'";
    } elseif (!empty($area)) {
        $searchQuery = "SELECT r.RecipientID, r.FirstName, r.LastName, a.Area 
                        FROM Recipient r 
                        JOIN Address a ON r.RecipientID = a.RecipientID 
                        WHERE a.Area = '$area'";
    } else {
        $searchQuery = $allRecipientsQuery; // Default query if no filters
    }

    $searchResults = mysqli_query($conn, $searchQuery);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipient Management - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="recipientmanage.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>Recipient Management</h1>
            <p>Search, edit, or delete recipient records as needed.</p>
        </header>

        <!-- Search Section -->
        <section class="search-section">
            <h2>Search Recipients</h2>
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
                            <td><?= $row['RecipientID']; ?></td>
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

        <!-- Full Recipient Table -->
        <section class="recipient-list">
            <h2>All Recipient Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Blood Type</th>
                        <th>Contact</th>
                        <th>Hospital ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($allRecipientsResult)) { ?>
                        <tr>
                            <td><?= $row['RecipientID']; ?></td>
                            <td><?= $row['FirstName']; ?></td>
                            <td><?= $row['LastName']; ?></td>
                            <td><?= $row['Gender']; ?></td>
                            <td><?= $row['DateOfBirth']; ?></td>
                            <td><?= $row['BloodType']; ?></td>
                            <td><?= $row['ContactNumber']; ?></td>
                            <td><?= $row['HospitalID']; ?></td>
                            <td>
                                <button class="edit-btn" onclick="editRecipient(<?= $row['RecipientID']; ?>)">Edit</button>
                                <button class="delete-btn" onclick="deleteRecipient(<?= $row['RecipientID']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>

    <script>
        // Delete functionality
        function deleteRecipient(recipientId) {
            if (confirm("Are you sure you want to delete this recipient?")) {
                window.location.href = `deleteRecipient.php?id=${recipientId}`;
            }
        }

        // Edit functionality
        function editRecipient(recipientId) {
            window.location.href = `editRecipient.php?id=${recipientId}`;
        }
    </script>
</body>
</html>
