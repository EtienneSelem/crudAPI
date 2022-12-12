<?php
class Database
{
    public $db;
    public function getConnection()
    {
        $this->db = null;
        try {
            $this->db = new mysqli('localhost', 'root', '', 'test');
        } catch (Exception $e) {
            echo "La base de donnees n\'est pas connectee: " . $e->getMessage();
        }
        return $this->db;
    }
}
