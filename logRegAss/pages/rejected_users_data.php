<?php include_once '../includes/db.php'; ?>
<?php
$str = "Rejected";
$sql = "SELECT * FROM users where action='$str'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table" id="rejTable">';
    echo '<thead>';
    echo '<tr>';
    echo '<th id="acpt-tbl">Firstname</th>';
    echo '<th id="acpt-tbl">Lastname</th>';
    echo '<th id="acpt-tbl">Email</th>';
    echo '<th id="acpt-tbl">Phone</th>';
    echo '<th id="acpt-tbl">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td id="acpt-tbl"><div>' . $row["firstname"] . '</div></td>';
        echo '<td id="acpt-tbl"><div>' . $row["lastname"] . '</div></td>';
        echo '<td id="acpt-tbl"><div>' . $row["email"] . '</div></td>';
        echo '<td id="acpt-tbl"><div>' . $row["phone"] . '</div></td>';
        echo '<td id="acpt-tbl"><div>' . $row["action"] . '</div></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "0 results";
}
?>