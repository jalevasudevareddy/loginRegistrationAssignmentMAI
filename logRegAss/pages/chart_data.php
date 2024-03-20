<?php include_once '../includes/db.php'; // Assuming db.php contains database connection code

if (isset($_POST["action"])) {

    if ($_POST["action"] == 'fetch') {
        $act = "";
        $query = "
		SELECT action, COUNT(id) AS Total 
		FROM users where action!='$act'
		GROUP BY action
		";

        $result = $conn->query($query);

        $data = array();

        foreach ($result as $row) {
            $data[] = array(
                'action' => $row["action"],
                'total' => $row["Total"],
                'color' => '#' . rand(100000, 999999) . ''
            );
        }

        echo json_encode($data);
    }
}


?>