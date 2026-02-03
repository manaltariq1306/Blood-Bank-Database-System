<?php
include 'db.php';

// Fetch recipient details if ID is passed
if (isset($_GET['id'])) {
    $recipientId = intval($_GET['id']); // Ensure ID is an integer
    $recipientQuery = "SELECT * FROM Recipient WHERE RecipientID = $recipientId";
    $result = mysqli_query($conn, $recipientQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $recipient = mysqli_fetch_assoc($result);
    } else {
        echo "Recipient not found.";
        exit;
    }
}

// Handle form submission to update recipient details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $bloodType = $_POST['bloodType'];
    $hospitalId = intval($_POST['hospitalId']); // Ensure HospitalID is an integer

    // Update query
    $updateQuery = "
        UPDATE Recipient 
        SET 
            FirstName = '$firstName', 
            LastName = '$lastName', 
            DateOfBirth = '$dateOfBirth', 
            Gender = '$gender', 
            ContactNumber = '$contactNumber', 
            BloodType = '$bloodType', 
            HospitalID = $hospitalId
        WHERE RecipientID = $recipientId
    ";
    
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: managerecipient.php"); // Redirect to the recipient management page after saving
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipient</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="recipientmanage.css">
</head>
<body>
    <h1>Edit Recipient Details</h1>
    <form method="POST">
        <label>First Name: <input type="text" name="firstName" value="<?= htmlspecialchars($recipient['FirstName']) ?>" required></label><br>
        <label>Last Name: <input type="text" name="lastName" value="<?= htmlspecialchars($recipient['LastName']) ?>" required></label><br>
        <label>Date of Birth: <input type="date" name="dateOfBirth" value="<?= htmlspecialchars($recipient['DateOfBirth']) ?>" required></label><br>
        <label>Gender: 
            <select name="gender" required>
                <option value="M" <?= $recipient['Gender'] == 'M' ? 'selected' : '' ?>>Male</option>
                <option value="F" <?= $recipient['Gender'] == 'F' ? 'selected' : '' ?>>Female</option>
            </select>
        </label><br>
        <label>Contact Number: <input type="text" name="contactNumber" value="<?= htmlspecialchars($recipient['ContactNumber']) ?>" required></label><br>
        <label>Blood Type: 
            <select name="bloodType" required>
                <option value="A+" <?= $recipient['BloodType'] == 'A+' ? 'selected' : '' ?>>A+</option>
                <option value="A-" <?= $recipient['BloodType'] == 'A-' ? 'selected' : '' ?>>A-</option>
                <option value="B+" <?= $recipient['BloodType'] == 'B+' ? 'selected' : '' ?>>B+</option>
                <option value="B-" <?= $recipient['BloodType'] == 'B-' ? 'selected' : '' ?>>B-</option>
                <option value="O+" <?= $recipient['BloodType'] == 'O+' ? 'selected' : '' ?>>O+</option>
                <option value="O-" <?= $recipient['BloodType'] == 'O-' ? 'selected' : '' ?>>O-</option>
                <option value="AB+" <?= $recipient['BloodType'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
                <option value="AB-" <?= $recipient['BloodType'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
            </select>
        </label><br>
        <label>Hospital ID: <input type="number" name="hospitalId" value="<?= htmlspecialchars($recipient['HospitalID']) ?>" required></label><br>
        <button type="submit">Save</button>
        <a href="recipientManage.php">Cancel</a>
    </form>
</body>
</html>
