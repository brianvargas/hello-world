<?php
require_once("Includes/db.php");
require_once("clsFunctions.php");
class clsUser{
    protected $clsLOG;
    protected $clsECS;
    protected $clsFunc;
    protected $idcl;
    protected $iduser;
    
    public function __construct() {
        if (!array_key_exists("idcl", $_SESSION)) {
            header('Location: index.php');
            exit;
        }
        $dbName = $_SESSION['db'];
        $this->iduser = $_SESSION['iduser'];
        $this->idcl = $_SESSION['idcl'];
        $this->clsLOG = new dbLOG();
        $this->clsECS = new dbLOG($dbName);
        $this->clsFunc = new clsFunc();
    }
    
    public function getUserInfo() {
        return sqlsrv_fetch_array($this->clsLOG->getDataset("SELECT * FROM users WHERE iduser = " . $this->iduser));
    }
    
    public function updateUserProfile($fullName,$contactNo,$description) {
        $fullName = htmlspecialchars($fullName);
        $contactNo = htmlspecialchars($contactNo);
        $description = htmlspecialchars($description);
        
        $query = "UPDATE users SET "
                . "userinfo='" . $fullName . "',"
                . "contactno='" . $contactNo . "',"
                . "description='" . $description . "' "
                . "WHERE iduser=" . $this->iduser
                ;
        $this->clsLOG->getDataSet($query);
        
        $query="";
        
        $query = "UPDATE tblTRX_CampaignLeaders_Hdr SET "
                . "CampaignLeader='" . $fullName . "',"
                . "ContactNo='" . $contactNo . "',"
                . "Description='" . $description . "' "
                . "WHERE TableID=" . $this->idcl
                ;
        $this->clsECS->getDataSet($query);
        
        $this->clsFunc->msgBox("Successfuly Saved");
    }
    
    public function updateAccount($userName,$password,$confirmPassword) {
        $userName = htmlspecialchars($userName);
        $password = htmlspecialchars($password);
        $confirmPassword = htmlspecialchars($confirmPassword);
        
        if ($password != $confirmPassword){
            return false;
        }
        else {
            $query = "UPDATE users SET "
                . "username='" . $userName . "',"
                . "password='" . $password . "' "
                . "WHERE iduser=" . $this->iduser
                ;
            $this->clsLOG->getDataSet($query);

            $this->clsFunc->msgBox("Successfuly Saved");
            return true;
        }
    }
}