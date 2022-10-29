<?php
require_once(dirname(__FILE__).'/../model/DbDrugType.php');
class DrugTypeDao {
    private $dbConnection;
 
    public function __construct($dbConnection){$this->dbConnection = $dbConnection;}

    public function fetchAllDrugType(){
        $listOfDbDrugType = array();
        $queryStatement = "SELECT * from drug_type";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows > 0){
            while($record = $dbResult->fetch_assoc()){
                array_push($listOfDbDrugType,new DbDrugType(
                    $record['id'],
                    $record['name'],
                    $record['created_at'],
                    $record['updated_at']
                ));
            }
            return $listOfDbDrugType;
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    public function fetchDrugTypeByNameOrId($drugNameOrId){
        $queryStatement = "SELECT * from drug_type where name='$drugNameOrId' OR id='$drugNameOrId'";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new  DbDrugType(
                $record['id'],
                $record['name'],
                $record['created_at'],
                $record['updated_at']
            );
            $this->dbConnection->close();
        }else{
            return null;
        }
    }
}

