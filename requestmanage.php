<?php
include 'db.php';

// Fetch all requests for initial display
$allRequestsQuery = "SELECT * FROM Request";
$allRequestsResult = mysqli_query($conn, $allRequestsQuery);

// Initialize variables for search results
$searchResults = [];
$isSearch = false;

// Handle filtering by status, month, priority, or blood type
if (isset($_POST['filter'])) {
    $isSearch = true;
    $status = $_POST['status'];
    $month = $_POST['month'];
    $priority = $_POST['priority'];
    $bloodType = $_POST['bloodType'];

    // Construct query based on filters
    $conditions = [];
    if (!empty($status)) {
        $conditions[] = "RequestStatus = '$status'";
    }
    if (!empty($month)) {
        $conditions[] = "MONTH(DateOfRequest) = $month";
    }
    if (!empty($priority)) {
        $conditions[] = "RequestPriority = '$priority'";
    }
    if (!empty($bloodType)) {
        $conditions[] = "BloodType = '$bloodType'";
    }

    // Combine conditions into a single query
    $filterQuery = "SELECT RequestID, HospitalID, RecipientID, BloodType, QuantityRequested, DateOfRequest, RequestStatus, RequestPriority 
                    FROM Request";
    if (count($conditions) > 0) {
        $filterQuery .= " WHERE " . implode(" AND ", $conditions);
    }

    $searchResults = mysqli_query($conn, $filterQuery);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Requests - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="managerequest.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>Manage Requests</h1>
            <p>View, filter, and manage blood requests.</p>
        </header>

        <!-- Filter Section -->
        <section class="filter-section">
            <h2>Filter Requests</h2>
            <form method="POST" action="">
                <div class="filter-group">
                    <label for="status">Filter by Status:</label>
                    <select id="status" name="status">
                        <option value="">-- Select Status --</option>
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="month">Filter by Month:</label>
                    <select id="month" name="month">
                        <option value="">-- Select Month --</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="priority">Filter by Priority:</label>
                    <select id="priority" name="priority">
                        <option value="">-- Select Priority --</option>
                        <option value="Urgent">Urgent</option>
                        <option value="Critical">Critical</option>
                        <option value="Normal">Normal</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="bloodType">Filter by Blood Type:</label>
                    <select id="bloodType" name="bloodType">
                        <option value="">-- Select Blood Type --</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
                <button type="submit" class="filter-btn" name="filter">Filter</button>
            </form>
        </section>

        <!-- Search Results -->
        <?php if ($isSearch && $searchResults && mysqli_num_rows($searchResults) > 0): ?>
        <section class="search-results">
            <h2>Search Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hospital ID</th>
                        <th>Recipient ID</th>
                        <th>Blood Type</th>
                        <th>Quantity</th>
                        <th>Date of Request</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($searchResults)) { ?>
                        <tr>
                            <td><?= $row['RequestID']; ?></td>
                            <td><?= $row['HospitalID']; ?></td>
                            <td><?= $row['RecipientID']; ?></td>
                            <td><?= $row['BloodType']; ?></td>
                            <td><?= $row['QuantityRequested']; ?></td>
                            <td><?= $row['DateOfRequest']; ?></td>
                            <td><?= $row['RequestStatus']; ?></td>
                            <td><?= $row['RequestPriority']; ?></td>
                            <td>
                                <?php if ($row['RequestStatus'] === 'Pending') { ?>
                                    <button onclick="updateStatus(<?= $row['RequestID']; ?>, 'Approved')">Approve</button>
                                    <button onclick="updateStatus(<?= $row['RequestID']; ?>, 'Rejected')">Reject</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <?php elseif ($isSearch): ?>
        <p>No results found for your filter criteria.</p>
        <?php endif; ?>

        <!-- Full Requests Table -->
        <section class="requests-list">
            <h2>All Blood Requests</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hospital ID</th>
                        <th>Recipient ID</th>
                        <th>Blood Type</th>
                        <th>Quantity</th>
                        <th>Date of Request</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($allRequestsResult)) { ?>
                        <tr>
                            <td><?= $row['RequestID']; ?></td>
                            <td><?= $row['HospitalID']; ?></td>
                            <td><?= $row['RecipientID']; ?></td>
                            <td><?= $row['BloodType']; ?></td>
                            <td><?= $row['QuantityRequested']; ?></td>
                            <td><?= $row['DateOfRequest']; ?></td>
                            <td><?= $row['RequestStatus']; ?></td>
                            <td><?= $row['RequestPriority']; ?></td>
                            <td>
                                <?php if ($row['RequestStatus'] === 'Pending') { ?>
                                    <button onclick="updateStatus(<?= $row['RequestID']; ?>, 'Approved')">Approve</button>
                                    <button onclick="updateStatus(<?= $row['RequestID']; ?>, 'Rejected')">Reject</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>

    <script>
        // Update request status
        function updateStatus(requestId, newStatus) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "updateRequestStatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Request status updated successfully!");
                    location.reload(); // Reload page to show updated data
                }
            };
            xhr.send(`id=${requestId}&status=${newStatus}`);
        }
    </script>
</body>
</html>
