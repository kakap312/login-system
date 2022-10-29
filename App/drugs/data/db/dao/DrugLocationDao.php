<?php
require_once(dirname(__FILE__).'/../model/DbDrugLocation.php');
class DrugLocationDao {
    private $dbConnection;
 
    public function __construct($dbConnection){$this->dbConnection = $dbConnection;}

    public function fetchAllDrugLocation(){
        $listOfDbDrugLocation = array();
        $queryStatement = "SELECT * from drug_location";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows > 0){
            while($record = $dbResult->fetch_assoc()){
                array_push($listOfDbDrugLocation,new DbDrugLocation(
                    $record['id'],
                    $record['name'],
                    $record['created_at'],
                    $record['updated_at']
                ));
            }
            return $listOfDbDrugLocation;
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    public function fetchDrugLocationByNameOrId($drugLocationNameOrId){
        $queryStatement = "SELECT * FROM drug_location where name='$drugLocationNameOrId' OR id='$drugLocationNameOrId'";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new  DbDrugLocation(
                $record['id'],
                $record['name'],
                $record['created_at'],
                $record['updated_at']
            );
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    public function fetchDrugLocationById($drugLocationId){
        $queryStatement = "SELECT * from drug_location where id='$drugLocationId'";
        $dbResult = $this->dbConnection->query($queryStatement);
        
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new  DbDrugLocation(
                $record['id'],
                $record['name'],
                $record['created_at'],
                $record['updated_at']
            );
        }else{
            return null;
        }
        $this->dbConnection->close();
    }


    


}

