<?php
require_once("Includes/db.php");
class clsPreference{
    protected $clsDB;
    protected $idcl;
    
    public function __construct() {
        if (!array_key_exists("idcl", $_SESSION)) {
            header('Location: index.php');
            exit;
        }
        $this->idcl = $_SESSION['idcl'];
        $this->clsDB = new dbLOG($_SESSION['db']);
    }
    
    public function getPositions(){
        $query = "SELECT DISTINCT Position,idPosition FROM web_GetCandidates";
        $result = $this->clsDB->getDataset($query,true);
        return $result;
    }
}