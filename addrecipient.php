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
        $firstName = $_POST['recipient_firstname'];
        $lastName = $_POST['recipient_lastname'];
        $gender = $_POST['recipient_gender'];
        $dob = $_POST['recipient_dob'];
        $bloodType = $_POST['recipient_blood'];
        $phone = $_POST['recipient_phone'];
        $hospitalID = $_POST['hospital_id'];

        // Insert data into the Recipient table
        $sql = "INSERT INTO Recipient (FirstName, LastName, Gender, DateOfBirth, BloodType, ContactNumber, HospitalID)
                VALUES (:firstName, :lastName, :gender, :dob, :bloodType, :phone, :hospitalID)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':bloodType', $bloodType);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':hospitalID', $hospitalID);

        $stmt->execute();

        echo "Recipient added successfully!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>