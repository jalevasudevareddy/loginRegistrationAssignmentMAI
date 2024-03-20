<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $action = $_POST['action'];

    // Update action in the database
    $sql = "UPDATE users SET action='$action' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        echo "Action updated successfully";
    } else {
        echo "Error updating action: " . $conn->error;
    }
}
?>