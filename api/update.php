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
$item->nom = $_GET['nom'];
$item->postnom = $_GET['postnom'];
$item->prenom = $_GET['prenom'];
$item->age = $_GET['age'];
$item->created = date('Y-m-d H:i:s');
if($item->updateEtudiant()){
echo json_encode("Donnees de l\'etudiant mis à jour avec succès !.");
} 
    else
    {
echo json_encode("La donnee ne peut etre mis à jour");
}
?>