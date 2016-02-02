<?php
require_once("Includes/db.php");
class clsAuth {
    protected $iduser;
    protected $clsDB;

    public function __construct() {
        if (isset($_SESSION['iduser'])){
            $this->iduser = $_SESSION['iduser'];
        }
        $this->clsDB = new dbLOG();
    }
    
    private function redirectPage($userType,$logged,$userName='',$redirect=true){
        if ($redirect){
            echo "<script type='text/javascript'>";
            if ($logged) {
                echo "window.alert('You are already logged in as:\\n". $userName . "');";
            }
            if ($userType==0){      //ACCOUNT: Admin
                echo "window.location.href='admin.php';";
            }
            else if ($userType==1){ //ACCOUNT: Campaign Leader
                echo "window.location.href='main.php';";
            }
            else if ($userType==2){ //ACCOUNT: Executive
                echo "window.location.href='exec.php';";
            }
            echo "</script>";
        }
    }
    
    public function userAlreadyLogged($logged=true,$redirect=true){
        $query = "SELECT * FROM users WHERE iduser = " . $this->iduser;
        $arrUser_temp = sqlsrv_fetch_array($this->clsDB->getDataSet($query));
        return $this->validCredentials($arrUser_temp['username'],$arrUser_temp['password'],$logged,$redirect);
    }
    public function validCredentials($user,$pass,$logged = false,$redirect=true){
        $userName = htmlspecialchars($user);
        $userPass = htmlspecialchars($pass);
        $query = "SELECT * FROM users WHERE username = '" . $userName . "' AND password = '" . $userPass . "'";
        $arrUser = sqlsrv_fetch_array($this->clsDB->getDataSet($query));
        if (count($arrUser) != 0) {
            $_SESSION['userinfo'] = htmlentities($arrUser['userinfo'], ENT_QUOTES, "ISO-8859-1");
            $_SESSION['db'] = htmlentities($arrUser['db'], ENT_QUOTES, "ISO-8859-1");
            $_SESSION['dbname'] = htmlentities($arrUser['dbname'], ENT_QUOTES, "ISO-8859-1");
            if (!$logged){
                $_SESSION['iduser'] = htmlentities($arrUser['iduser'], ENT_QUOTES, "ISO-8859-1");
                $_SESSION['idcl'] = htmlentities($arrUser['idcampaignleaderid'], ENT_QUOTES, "ISO-8859-1");
            }
            $this->redirectPage($arrUser['usertype'],$logged,$arrUser['userinfo'],$redirect);
            return true;
        }
        else {
            return false;
        }
    }
}
?>