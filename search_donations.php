<?php
include 'db.php'; // Ensure this file initializes a $conn variable for MySQLi
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Past Donations</title>
    <link rel="stylesheet" href="donor.css">
</head>
<body>
    <h1>Search Past Donations</h1>
    <form method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <button type="submit" name="search">Search</button>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $firstName = trim($_POST['first_name']); // Sanitize input
        $lastName = trim($_POST['last_name']);  // Sanitize input

        // Prepare the query
        $stmt = $conn->prepare("
            SELECT Donation.DonationID, Donation.DateOfDonation, Donation.Quantity, Donor.FirstName, Donor.LastName 
            FROM Donation 
            JOIN Donor ON Donation.DonorID = Donor.DonorID 
            WHERE Donor.FirstName = ? AND Donor.LastName = ?
        ");
        $stmt->bind_param("ss", $firstName, $lastName); // Bind parameters
        $stmt->execute(); // Execute the statement
        $result = $stmt->get_result(); // Get the result set

        if ($result->num_rows > 0) {
            echo "<table><tr><th>DonationID</th><th>Date</th><th>Quantity</th><th>FirstName</th><th>LastName</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['DonationID']}</td><td>{$row['DateOfDonation']}</td><td>{$row['Quantity']}</td><td>{$row['FirstName']}</td><td>{$row['LastName']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No donations found for {$firstName} {$lastName}.";
        }

        $stmt->close(); // Close the statement
    }
    ?>
</body>
</html>
