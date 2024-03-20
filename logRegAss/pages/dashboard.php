<?php
include_once '../includes/db.php';

// Fetch data from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="container" id="dashboard">
        <h2 style="text-align: center;">Welcome to Dashboard</h2>
        <div class="options">
            <button class="dash-btn" onclick="updateAction('New User')">New User</button>
            <button class="dash-btn" onclick="updateAction('Rejected')">Rejected</button>
            <button class="dash-btn" onclick="updateAction('Deleted')">Deleted</button>
            <button class="dash-btn" onclick="updateAction('Accepted')">Accepted</button>
        </div>
        <br>
        <table id="usersTable" border="1px">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr onclick='highlightRow(this)'>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['action'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="../js/dashboard.js" defer></script>
</body>

</html>