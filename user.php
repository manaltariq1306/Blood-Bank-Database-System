<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <!-- Main Container -->
    <div class="container">
        <h1>Welcome to the Blood Bank Management System</h1>
        <p>Choose an option below to get started:</p>

        <!-- Logout Button -->
        <div class="logout-container">
            <a href="index.php" class="logout-button">Logout</a>
        </div>

        <!-- Box Container -->
        <div class="box-container">
            <div class="box">
                <a href="donor.php">
                    <h3>🩸 Register as Donor</h3>
                    <p>Sign up to save lives by donating blood.</p>
                </a>
            </div>
            <div class="box">
                <a href="recipient.php">
                    <h3>🧑‍🤝‍🧑 Register as Recipient</h3>
                    <p>Sign up to receive life-saving blood.</p>
                </a>
            </div>
            <div class="box">
                <a href="make_donation.php">
                    <h3>❤️ Make a Donation</h3>
                    <p>Give the gift of life by donating blood.</p>
                </a>
            </div>
            <div class="box">
                <a href="make_request.php">
                    <h3>🩺 Make a Request</h3>
                    <p>Request blood for yourself or your hospital.</p>
                </a>
            </div>
            <div class="box">
                <a href="search_donations.php">
                    <h3>🔍 Search Donations</h3>
                    <p>View your past blood donation records.</p>
                </a>
            </div>
            <div class="box">
                <a href="search_transcripts.php">
                    <h3>📜 Search Transcripts</h3>
                    <p>View your blood transfusion records.</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>