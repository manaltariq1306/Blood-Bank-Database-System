<?php
include 'db.php';

// Fetch donor details if ID is passed
if (isset($_GET['id'])) {
    $donorId = intval($_GET['id']); // Ensure ID is an integer
    $donorQuery = "SELECT * FROM Donor WHERE DonorID = $donorId";
    $result = mysqli_query($conn, $donorQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $donor = mysqli_fetch_assoc($result);
    } else {
        echo "Donor not found.";
        exit;
    }
}

// Handle form submission to update donor details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $bloodType = $_POST['bloodType'];
    $healthStatus = $_POST['healthStatus'];

    // Update query
    $updateQuery = "
        UPDATE Donor 
        SET 
            FirstName = '$firstName', 
            LastName = '$lastName', 
            DateOfBirth = '$dateOfBirth', 
            Gender = '$gender', 
            ContactNumber = '$contactNumber', 
            Email = '$email', 
            BloodType = '$bloodType', 
            HealthStatus = '$healthStatus' 
        WHERE DonorID = $donorId
    ";
    
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: managedonor.php"); // Redirect to the admin panel after saving
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
    <title>Edit Donor</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Edit Donor Details</h1>
    <form method="POST">
        <label>First Name: <input type="text" name="firstName" value="<?= htmlspecialchars($donor['FirstName']) ?>" required></label><br>
        <label>Last Name: <input type="text" name="lastName" value="<?= htmlspecialchars($donor['LastName']) ?>" required></label><br>
        <label>Date of Birth: <input type="date" name="dateOfBirth" value="<?= htmlspecialchars($donor['DateOfBirth']) ?>" required></label><br>
        <label>Gender: 
            <select name="gender" required>
                <option value="M" <?= $donor['Gender'] == 'M' ? 'selected' : '' ?>>Male</option>
                <option value="F" <?= $donor['Gender'] == 'F' ? 'selected' : '' ?>>Female</option>
            </select>
        </label><br>
        <label>Contact Number: <input type="text" name="contactNumber" value="<?= htmlspecialchars($donor['ContactNumber']) ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($donor['Email']) ?>" required></label><br>
        <label>Blood Type: 
            <select name="bloodType" required>
                <option value="A+" <?= $donor['BloodType'] == 'A+' ? 'selected' : '' ?>>A+</option>
                <option value="A-" <?= $donor['BloodType'] == 'A-' ? 'selected' : '' ?>>A-</option>
                <option value="B+" <?= $donor['BloodType'] == 'B+' ? 'selected' : '' ?>>B+</option>
                <option value="B-" <?= $donor['BloodType'] == 'B-' ? 'selected' : '' ?>>B-</option>
                <option value="O+" <?= $donor['BloodType'] == 'O+' ? 'selected' : '' ?>>O+</option>
                <option value="O-" <?= $donor['BloodType'] == 'O-' ? 'selected' : '' ?>>O-</option>
                <option value="AB+" <?= $donor['BloodType'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
                <option value="AB-" <?= $donor['BloodType'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
            </select>
        </label><br>
        <label>Health Status: <textarea name="healthStatus" required><?= htmlspecialchars($donor['HealthStatus']) ?></textarea></label><br>
        <button type="submit">Save</button>
        <a href="adminPanel.php">Cancel</a>
    </form>
</body>
</html>
