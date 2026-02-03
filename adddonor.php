<?php
// Database connection
$host = 'localhost'; // Replace with your DB host
$dbname = 'bloodmanagement'; // Replace with your DB name
$username = 'root'; // Replace with your DB username
$password = ''; // Replace with your DB password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form data is received
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $firstName = $_POST['donor_firstname'];
        $lastName = $_POST['donor_lastname'];
        $dob = $_POST['donor_dob'];
        $gender = $_POST['donor_gender'];
        $bloodType = $_POST['donor_blood'];
        $email = $_POST['donor_email'];
        $phone = $_POST['donor_phone'];
        $healthStatus = $_POST['donor_health'];

        // Insert data into the Donor table
        $sql = "INSERT INTO Donor (FirstName, LastName, DateOfBirth, Gender, BloodType, Email, ContactNumber, HealthStatus)
                VALUES (:firstName, :lastName, :dob, :gender, :bloodType, :email, :phone, :healthStatus)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':bloodType', $bloodType);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':healthStatus', $healthStatus);

        $stmt->execute();

        echo "Donor added successfully!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>