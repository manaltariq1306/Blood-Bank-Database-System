<?php
include 'db.php'; // Ensure this file initializes a $conn variable for MySQLi

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_request'])) {
    $recipientId = $_POST['recipient_id'];
    $hospitalId = $_POST['hospital_id'];
    $bloodType = $_POST['blood_type'];
    $quantity = $_POST['quantity'];
    $priority = $_POST['priority'];
    $date = date('Y-m-d'); // Current date
    $status = 'Pending';

    // Insert the request into the database
    $stmt = $conn->prepare("INSERT INTO Request (HospitalID, RecipientID, BloodType, QuantityRequested, DateOfRequest, RequestStatus, RequestPriority) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisisss", $hospitalId, $recipientId, $bloodType, $quantity, $date, $status, $priority);

    if ($stmt->execute()) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Make a Request</title>
    <link rel="stylesheet" href="donor.css" />
</head>
<body>
    <h1>Make a Request</h1>
    <p>You must be registered to make a request.</p>

    <!-- Search Recipient and Hospital Section -->
    <form method="POST">
        <label for="name">Search Recipient and Hospital ID:</label>
        <input type="text" name="name" placeholder="Enter Name" required>
        <button type="submit" name="search">Search</button>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $name = trim($_POST['name']);
        $likeName = "%" . $name . "%";

        // Search for Recipient and Hospital IDs
        $stmt = $conn->prepare("SELECT RecipientID, HospitalID, FirstName, LastName FROM Recipient WHERE FirstName LIKE ? OR LastName LIKE ?");
        $stmt->bind_param("ss", $likeName, $likeName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table><tr><th>RecipientID</th><th>HospitalID</th><th>FirstName</th><th>LastName</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['RecipientID']}</td>
                        <td>{$row['HospitalID']}</td>
                        <td>{$row['FirstName']}</td>
                        <td>{$row['LastName']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No recipients found.";
        }

        $stmt->close();
    }
    ?>

    <!-- Request Form -->
    <form method="POST">
        <label for="recipient_id">Recipient ID:</label>
        <input type="number" name="recipient_id" required>
        <label for="hospital_id">Hospital ID:</label>
        <input type="number" name="hospital_id" required>
        <label for="blood_type">Blood Type:</label>
        <select name="blood_type" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <label for="priority">Request Priority:</label>
        <select name="priority" required>
            <option value="Normal">Normal</option>
            <option value="Urgent">Urgent</option>
            <option value="Critical">Critical</option>
        </select>
        <button type="submit" name="submit_request">Submit Request</button>
    </form>
</body>
</html>
