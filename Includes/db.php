<?php
session_start();
class dbLOG{
    protected $conn;
    public function __construct($dbName="ecs"){
        $dbHost = ".";
        $connectionInfo = array( "Database"=>$dbName,"UID"=>"sa","PWD"=>"sa");
        $this->conn = sqlsrv_connect( $dbHost, $connectionInfo);
        if (!$this->conn) {
            exit('Connect Error (' . sqlsrv_errors() . ') '
                    . sqlsrv_errors());
        }
    }
    
    public function getDataSet($query,$isTable=false){
        $result = sqlsrv_query($this->conn,$query);        
        ini_set('memory_limit', '-1');
        if ($isTable){
            while($row=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
            $resultset[] = $row;
            }
            if(!empty($resultset)){
                return $resultset;
            }
        }
        else{
            if(!empty($result)){
                return $result;
            }
        }
    }
}
?>