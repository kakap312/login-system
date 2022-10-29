<?php
require_once(dirname(__FILE__).'/../model/DbDrugGroup.php');
class DrugGroupDao{
    private $dbConnection;

    public function __construct($dbConnection){
        $this->dbConnection = $dbConnection;
    }
    public function fetchAllGroups(){
        $listOfDbDrugs = array();
        $queryStatement = "SELECT * from drug_group";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows > 0){
            while($record = $dbResult->fetch_assoc()){
                array_push($listOfDbDrugs,new DbDrugGroup(
                    $record['id'],
                    $record['group_name'],
                    $record['created_at'],
                    $record['updated_at']
                ));
            }
            return $listOfDbDrugs;
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    public function fetchDrugGroupByNameOrId($drugNameOrId){
        $queryStatement = "SELECT * from drug_group where group_name='$drugNameOrId' OR id='$drugNameOrId'";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new  DbDrugGroup(
                $record['id'],
                $record['group_name'],
                $record['created_at'],
                $record['updated_at']
            );
        }else{
            return null;
        }
        $this->dbConnection->close();
    }

}