<?php
class Etudiant
{
    // dbection
    private $db;
    // Table
    private $db_table = "etudiant";
    // Attributs
    public $id;
    public $nom;
    public $postnom;
    public $prenom;
    public $age;
    public $created;
    public $result;

    // Connection à la BD
    public function __construct($db)
    {
        $this->db = $db;
    }
    // GET ALL
    public function getEtudiant()
    {
        $sqlQuery = "SELECT id, nom, postnom, prenom, age, created FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createEtudiant()
    {
        // Informations necessaires pour inscription à la BD
        $this->name = htmlspecialchars(strip_tags($this->nom));
        $this->email = htmlspecialchars(strip_tags($this->postnom));
        $this->designation = htmlspecialchars(strip_tags($this->prenom));
        $this->designation = htmlspecialchars(strip_tags($this->age));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $sqlQuery = "INSERT INTO
" . $this->db_table . " SET nom = '" . $this->nom . "',
postnom = '" . $this->postnom . "',
prenom = '" . $this->prenom . "', age = '" . $this->age . "', created = '" . $this->created . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function getSingleEtudiant()
    {
        $sqlQuery = "SELECT id, nom, postnom, prenom, age, created FROM
" . $this->db_table . " WHERE id = " . $this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow = $record->fetch_assoc();
        $this->nom = $dataRow['nom'];
        $this->postnom = $dataRow['postnom'];
        $this->prenom = $dataRow['prenom'];
        $this->age = $dataRow['age'];
        $this->created = $dataRow['created'];
    }

    // UPDATE
    public function updateEtudiant()
    {
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->postnom = htmlspecialchars(strip_tags($this->postnom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->created = htmlspecialchars(strip_tags($this->created));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE " . $this->db_table . " SET nom = '" . $this->nom . "',
postnom = '" . $this->postnom . "',
prenom = '" . $this->prenom . "', age = '" . $this->age . "', created = '" . $this->created . "'
WHERE id = " . $this->id;

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteEtudiant()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}