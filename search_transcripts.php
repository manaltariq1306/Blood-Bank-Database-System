<?php
include 'db.php'; // Ensure this file initializes a $conn variable for MySQLi
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Recipient Transcripts</title>
    <link rel="stylesheet" href="donor.css">
</head>
<body>
    <h1>Search Recipient Transcripts</h1>
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
            SELECT BloodTransfusion.TransfusionID, BloodTransfusion.DateOfTransfusion, BloodTransfusion.QuantityTransfused, 
                   Recipient.FirstName, Recipient.LastName, Request.RequestID, Request.BloodType, Request.QuantityRequested
            FROM BloodTransfusion
            JOIN Recipient ON BloodTransfusion.RecipientID = Recipient.RecipientID
            JOIN Request ON BloodTransfusion.RequestID = Request.RequestID
            WHERE Recipient.FirstName = ? AND Recipient.LastName = ?
        ");
        $stmt->bind_param("ss", $firstName, $lastName); // Bind parameters
        $stmt->execute(); // Execute the statement
        $result = $stmt->get_result(); // Get the result set

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>TransfusionID</th>
                        <th>Date</th>
                        <th>Quantity Transfused</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Request ID</th>
                        <th>Blood Type</th>
                        <th>Quantity Requested</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['TransfusionID']}</td>
                        <td>{$row['DateOfTransfusion']}</td>
                        <td>{$row['QuantityTransfused']}</td>
                        <td>{$row['FirstName']}</td>
                        <td>{$row['LastName']}</td>
                        <td>{$row['RequestID']}</td>
                        <td>{$row['BloodType']}</td>
                        <td>{$row['QuantityRequested']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No transcripts found for {$firstName} {$lastName}.";
        }

        $stmt->close(); // Close the statement
    }
    ?>
</body>
</html>
