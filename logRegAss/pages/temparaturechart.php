<?php include_once '../includes/db.php'; // Assuming db.php contains database connection code

if (isset($_POST["action"])) {

    if ($_POST["action"] == 'fetch') {
        $act = "";
        $query = "select u.id id, u.firstname, m.class1 class1,m.class2 class2, m.class3 class3 from users u, marks m where u.id=m.userid";

        $result = $conn->query($query);

        $data = array();

        foreach ($result as $row) {
            $data[] = array(
                'id' => $row["id"],
                'firstname' => $row["firstname"],
                'class1' => $row["class1"],
                'class2' => $row["class2"],
                'class3' => $row["class3"]
            );
        }

        echo json_encode($data);
    }
}


?>