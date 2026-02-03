<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports and Analytics</title>
    <link rel="stylesheet" href="reportstyles.css">
    <script src="reportscripts.js" defer></script>
</head>
<body>
    <header>
        <h1>Reports and Analytics</h1>
    </header>
    <main>
        <div class="container">
            <!-- Recipient Reports -->
            <div class="box">
                <h2>Recipient Reports</h2>
                <select onchange="fetchReport('queries/recipient-reports.php', this.value)">
                    <option value="">Select Report</option>
                    <option value="all-transcripts">All Transcripts</option>
                    <option value="enrollment-per-hospital">Recipient Enrollment per Hospital</option>
                </select>
            </div>

            <!-- Donor Reports -->
            <div class="box">
                <h2>Donor Reports</h2>
                <select onchange="fetchReport('queries/donor-reports.php', this.value)">
                    <option value="">Select Report</option>
                    <option value="contribution-summary">Donor Contribution Summary</option>
                    <option value="annual-donation-count">Annual Blood Donation Count by Month</option>
                    <option value="trends-by-blood-type">Donation Trends by Blood Type</option>
                </select>
            </div>

            <!-- BloodStock Reports -->
            <div class="box">
                <h2>BloodStock Reports</h2>
                <select onchange="fetchReport('queries/bloodstock-reports.php', this.value)">
                    <option value="">Select Report</option>
                    <option value="monthly-overview">Monthly Blood Stock Overview (Annual Report)</option>
                    <option value="collection-trends">Blood Type Collection Trends (Annual Report)</option>
                </select>
            </div>

            <!-- Request Reports -->
            <div class="box">
                <h2>Request Reports</h2>
                <select onchange="fetchReport('queries/request-reports.php', this.value)">
                    <option value="">Select Report</option>
                    <option value="blood-request-overview">Blood Request Overview (Annual Report)</option>
                </select>
            </div>

            <!-- Blood Compatibility Report -->
            <div class="box">
                <h2>Blood Compatibility Report</h2>
                <button onclick="fetchReport('queries/compatibility-report.php', '')">View Report</button>
            </div>

            <!-- Expiry Check Report -->
            <div class="box">
                <h2>Expiry Check Report</h2>
                <button onclick="fetchReport('queries/expiry-check-report.php', '')">View Report</button>
            </div>
        </div>

        <section id="report-output">
            <h3>Report Results</h3>
            <div id="report-container"></div>
        </section>
    </main>
</body>
</html>
