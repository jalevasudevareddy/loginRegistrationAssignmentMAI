<?php
include_once '../includes/db.php'; // Assuming db.php contains database connection code

// Check if the action parameter is set in the POST request
header('Content-Type:application/json');

try {
    // Query to select all data from the 'marks' table
    $query = "select u.id id, u.firstname, m.class1 class1,m.class2 class2, m.class3 class3 from users u, marks m where u.id=m.userid";

    // Execute the query
    $result = $conn->query($query);

    // Check if there are any results
    if ($result) {
        // Fetch the data and store it in an array
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Encode the data as JSON and output it
        echo json_encode($data);
    } else {
        // No data found, return an empty array
        echo json_encode([]);
    }
} catch (Exception $e) {
    // Error occurred, return an error message
    echo json_encode(["error" => $e->getMessage()]);
}
?>