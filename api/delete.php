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

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

if($item->deleteEtudiant()){
echo json_encode("Etudiant supprimé.");
} else{
echo json_encode("La Données n\'a pas pu etre supprimée");
}
?>