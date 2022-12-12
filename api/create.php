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


$item->nom = $_GET['nom'];
$item->postnom = $_GET['postnom'];
$item->prenom = $_GET['prenom'];
$item->age = $_GET['age'];
$item->created = date('Y-m-d H:i:s');
if($item->createEtudiant()){
echo 'Etudiant crée avec succès.';
} else{
echo 'Etudiant ne peut etre crée.';
}
?>