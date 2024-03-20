<?php
include_once '../includes/db.php';
header('Content-Type: application/json');

// Assuming the request body contains JSON data with 'id' and 'action' properties
$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$action = $data['action'];

try {
    // Update the database based on the action
    switch ($action) {
        case 'Accept':
            $query = "UPDATE users SET action='Accepted' WHERE id=$id";
            break;
        case 'Reject':
            $query = "UPDATE users SET action='Rejected' WHERE id=$id";
            break;
        case 'Delete':
            $query = "DELETE FROM users WHERE id=$id";
            break;
        default:
            echo json_encode(["error" => "Invalid action"]);
            exit();
    }

    if ($conn->query($query)) {
        echo json_encode(["success" => "Action performed successfully"]);
    } else {
        echo json_encode(["error" => "Failed to perform action"]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>