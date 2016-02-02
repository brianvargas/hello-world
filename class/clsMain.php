<?php
require_once("Includes/db.php");
class clsMain{
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
    
    public function getCampaignLeader_ByUserID() {
        $query = "SELECT * FROM tblTRX_CampaignLeaders_Hdr WHERE TableID = " . $this->idcl;
        $cl = sqlsrv_fetch_array($this->clsDB->getDataset($query));
        if(count($cl)!=0){
            return ucwords(trim($cl['CampaignLeader']));
        }
        else {
            header('Location: index.php');
        }
    }
    
    public function getPositions(){
        $query = "SELECT DISTINCT Position,idPosition FROM web_GetCandidates";
        $result = $this->clsDB->getDataset($query,true);
        return $result;
    }
    public function getCandidates($idPosition){
        $query = "SELECT Candidate,idCandidate FROM web_GetCandidates WHERE idPosition=" . $idPosition;
        $result = $this->clsDB->getDataset($query,true);
        return $result;
    }
    public function getCampaignLeaderDashboard($candidate){
        $candidate = htmlspecialchars($candidate);
        $query = "EXEC web_SP_GetCampaignLeaderDashboard ".$this->idcl.",'".$candidate."'";
        $result = $this->clsDB->getDataset($query,true);
        return $result;
    }
}