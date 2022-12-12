<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    include_once '../database.php';
    include_once '../etudiants.php';
    $database = new Database();

    $db = $database->getConnection();
    $items = new Etudiant($db);
    $records = $items->getEtudiant();
    $itemCount = $records->num_rows;
    echo json_encode($itemCount);
    if ($itemCount > 0) {
        $etudiantArr = array();
        $etudiantArr["body"] = array();
        $etudiantArr["itemCount"] = $itemCount;
        while ($row = $records->fetch_assoc()) {
            array_push($etudiantArr["body"], $row);
        }
        echo json_encode($etudiantArr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "Aucun enregistrement trouvé !!!.")
        );
    }
