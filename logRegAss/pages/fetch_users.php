<?php
include_once '../includes/db.php'; // Assuming db.php contains database connection code

$act = "";
$sql = "SELECT * FROM users where action='$act'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div style="overflow-x:auto;">'; // To enable horizontal scrolling if needed
    echo '<table id="userTable" style="border-collapse: collapse; width: 100%;">'; // Define table styles
    // Output table headers
    echo '<tr>';
    echo '<th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">First Name</th>';
    echo '<th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Last Name</th>';
    echo '<th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Email</th>';
    echo '<th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Phone</th>';
    echo '<th style="border: 1px solid #ccc; padding: 8px; background-color: #f2f2f2;">Action</th>';
    echo '</tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="border: 1px solid #ccc; padding: 8px;">' . $row["firstname"] . '</td>';
        echo '<td style="border: 1px solid #ccc; padding: 8px;">' . $row["lastname"] . '</td>';
        echo '<td style="border: 1px solid #ccc; padding: 8px;">' . $row["email"] . '</td>';
        echo '<td style="border: 1px solid #ccc; padding: 8px;">' . $row["phone"] . '</td>';
        echo '<td style="border: 1px solid #ccc; padding: 8px;">
              <button class="accept-btn btn btn-success" data-id="' . $row["id"] . '" data-action="accepted">Accept</button>
              <button class="reject-btn btn btn-warning" data-id="' . $row["id"] . '" data-action="rejected">Reject</button>
              <button class="delete-btn btn btn-danger" data-id="' . $row["id"] . '" data-action="deleted">Delete</button>
              </td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
} else {
    echo "0 results";
}
?>