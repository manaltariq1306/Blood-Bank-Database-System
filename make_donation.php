<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['donor_id'])) {
    // Insert donation into the database
    $donorId = $_POST['donor_id'];
    $date = $_POST['date_of_donation'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO Donation (DonorID, DateOfDonation, Quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $donorId, $date, $quantity);

    if ($stmt->execute()) {
        echo "Donation recorded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Donation</title>
    <link rel="stylesheet" href="donor.css">
</head>
<body>
    <h1>Make a Donation</h1>
    <p>You must be registered to make a donation.</p>

    <!-- Search Donor Section -->
    <form method="POST">
        <label for="name">Search Donor ID:</label>
        <input type="text" name="name" placeholder="Enter First or Last Name" required>
        <button type="submit" name="search">Search</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        $name = trim($_POST['name']);
        $likeName = "%" . $name . "%";

        $stmt = $conn->prepare("SELECT DonorID, FirstName, LastName FROM Donor WHERE FirstName LIKE ? OR LastName LIKE ?");
        $stmt->bind_param("ss", $likeName, $likeName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr><th>DonorID</th><th>FirstName</th><th>LastName</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['DonorID']}</td>
                        <td>{$row['FirstName']}</td>
                        <td>{$row['LastName']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No donors found with the name '$name'.</p>";
        }

        $stmt->close();
    }
    ?>

    <!-- Make a Donation Section -->
    <form method="POST">
        <label for="donor_id">Donor ID:</label>
        <input type="number" name="donor_id" required>
        <label for="date_of_donation">Date of Donation:</label>
        <input type="date" name="date_of_donation" required>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
