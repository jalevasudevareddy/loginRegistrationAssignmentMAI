<?php
include_once '../includes/db.php';
header('Content-Type: application/json');
try {

    $query = 'select * from users';
    $result = $conn->query($query);
    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>