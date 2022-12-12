<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../database.php';
    include_once '../etudiants.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Etudiant($db);
    // $item->nom = isset($_GET['nom']) ? $_GET['nom'] : die();
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->getSingleEtudiant();
    if($item->name != null){

    // create array
    $emp_arr = array(
    "id" => $item->id,
    "nom" => $item->nom,
    "postnom" => $item->postnom,
    "prenom" => $item->prenom,
    "age" => $item->age,
    "created" => $item->created
    );

    http_response_code(200);
    echo json_encode($emp_arr);
    }
    else{
    http_response_code(404);
    echo json_encode("Etudiant introuvable.");
    }
?>