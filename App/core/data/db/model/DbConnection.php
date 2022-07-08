<?php
class DbConnection{
    private $dbUserName;
    private $dbPassword;
    private $dbServerName;
    

    public function __construct($dbUserName, $dbPassword,$dbServerName){
        $this->dbUserName = $dbUserName;
        $this->dbPassword = $dbPassword;
        $this->dbServerName = $dbServerName;
    }
     public function getDbConnection(){
        $dbConnection = new mysqli($this->dbServerName,$this->dbPassword,$this->dbServerName);
        return $dbConnection;
     }
}
?>