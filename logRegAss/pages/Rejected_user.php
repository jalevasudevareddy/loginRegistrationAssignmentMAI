<?php
include_once '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];

    // Update user action to rejected in the database
    $sql = "UPDATE users SET action='Rejected' WHERE id='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "User rejected successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>