<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recipient registeration</title>
    <link rel="stylesheet" href="donor.css" />
  </head>
  <body>
    <div class="main-content">
      <h1>Recipient Registeration</h1>
      
      <!-- Form for Adding Recipients -->
      <form action="addrecipient.php" method="POST">
        <label for="recipient-firstname">First Name:</label>
        <input
          type="text"
          id="recipient-firstname"
          name="recipient_firstname"
          placeholder="Enter recipient's first name"
          required
        />

        <label for="recipient-lastname">Last Name:</label>
        <input
          type="text"
          id="recipient-lastname"
          name="recipient_lastname"
          placeholder="Enter recipient's last name"
          required
        />

        <label for="recipient-gender">Gender:</label>
        <select id="recipient-gender" name="recipient_gender" required>
          <option value="">-- Select Gender --</option>
          <option value="M">Male</option>
          <option value="F">Female</option>
        </select>

        <label for="recipient-dob">Date of Birth:</label>
        <input
          type="date"
          id="recipient-dob"
          name="recipient_dob"
          required
        />

        <label for="recipient-blood">Blood Group:</label>
        <select id="recipient-blood" name="recipient_blood" required>
          <option value="">-- Select Blood Group --</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
        </select>

        <label for="recipient-phone">Phone Number:</label>
        <input
          type="number"
          id="recipient-phone"
          name="recipient_phone"
          placeholder="Enter phone number"
          required
        />

        <label for="hospital-select">Select Hospital:</label>
        <select id="hospital-select" name="hospital_id" required>
          <!-- Dynamic options will be populated here -->
        </select>

        <button type="submit">Add Recipient</button>
      </form>
    </div>

    <script>
      // Hospital data (simulating database records)
      const hospitals = [
        { id: 1, name: "City General Hospital" },
        { id: 2, name: "River Valley Hospital" },
        { id: 3, name: "Hillside Medical Center" },
        { id: 4, name: "Downtown Health Clinic" },
        { id: 5, name: "Lakeshore Hospital" },
        { id: 6, name: "Mountain View Hospital" },
        { id: 7, name: "Seaside Medical Center" },
        { id: 8, name: "Greenfield Hospital" },
        { id: 9, name: "Sunnyvale Hospital" },
        { id: 10, name: "Metro City Hospital" },
      ];

      // Populate hospital dropdown
      const hospitalSelect = document.getElementById("hospital-select");

      hospitals.forEach((hospital) => {
        const option = document.createElement("option");
        option.value = hospital.id;
        option.textContent = hospital.name;
        hospitalSelect.appendChild(option);
      });
    </script>
  </body>
</html>