<?php
include_once '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];

    // Update user action to accepted in the database
    $sql = "UPDATE users SET action='Accepted' WHERE id='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "User accepted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>