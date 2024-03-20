<?php
include_once '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];

    // Delete user from the database
    $sql = "DELETE FROM users WHERE id='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>