<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donor registeration</title>
    <link rel="stylesheet" href="donor.css" />
  </head>
  <body>
    <div class="main-content">
      <h1>Donor Registeration</h1>
      

      <!-- Form for Adding Donors -->
      <form action="adddonor.php" method="POST">
        <label for="donor-firstname">First Name:</label>
        <input
          type="text"
          id="donor-firstname"
          name="donor_firstname"
          placeholder="Enter first name"
          required
        />

        <label for="donor-lastname">Last Name:</label>
        <input
          type="text"
          id="donor-lastname"
          name="donor_lastname"
          placeholder="Enter last name"
          required
        />

        <label for="donor-dob">Date of Birth:</label>
        <input
          type="date"
          id="donor-dob"
          name="donor_dob"
          required
        />

        <label for="donor-gender">Gender:</label>
        <select id="donor-gender" name="donor_gender" required>
          <option value="">-- Select Gender --</option>
          <option value="M">Male</option>
          <option value="F">Female</option>
        </select>

        <label for="donor-blood">Blood Group:</label>
        <select id="donor-blood" name="donor_blood" required>
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

        <label for="donor-email">Email:</label>
        <input
          type="email"
          id="donor-email"
          name="donor_email"
          placeholder="Enter email"
          required
        />

        <label for="donor-phone">Phone Number:</label>
        <input
          type="number"
          id="donor-phone"
          name="donor_phone"
          placeholder="Enter phone number"
          required
        />

        <label for="donor-health">Health Status:</label>
        <textarea
          id="donor-health"
          name="donor_health"
          rows="3"
          placeholder="Enter health status"
        ></textarea>

        <button type="submit">Add Donor</button>
      </form>
    </div>
  </body>
</html>