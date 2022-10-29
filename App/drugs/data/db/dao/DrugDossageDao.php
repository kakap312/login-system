<?php
class DrugDossageDao{
    private $dbConnection;

    public function __construct($dbConnection){
        $this->dbConnection = $dbConnection;
    }
    public function insert($dbDrugDossage){
        $dossageId = $dbDrugDossage->getDossageId();
        $drugId = $dbDrugDossage->getDrugId();
        $ageGroup = $dbDrugDossage->getAgeGroup();
        $dossage = $dbDrugDossage->getDossage();
        $queryStatement = "insert into drug_dosage values
        ('$dossageId','$drugId','$ageGroup','$dossage')";
         return $this->dbConnection->query($queryStatement)?true:false;
        $this->dbConnection->close();
    }
    public function update($dbDrugDossage){
        $drugId = $dbDrugDossage->getDrugId();
        $ageGroup = $dbDrugDossage->getAgeGroup();
        $dossage = $dbDrugDossage->getDossage();
        $queryStatement = "update  drug_dosage SET age_group='$ageGroup', dossage='$dossage' WHERE drug_id='$drugId' AND age_group='$ageGroup'";
         return $this->dbConnection->query($queryStatement)?true:false;
        $this->dbConnection->close();
    }
    
    public  function searchDrugDossageByDrugIdAndAgeGroup($drugId,$ageGroup){
        $queryStatement = "SELECT * FROM drug_dosage where drug_id = '$drugId' AND age_group='$ageGroup'";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new DbDrugDossage(
                $record['dossge_id'],
                $record['drug_id'],
                $record['age_group'],
                $record['dossage']
            );
        }else{
            return null;
        }
        $this->dbConnection->close();

    }
}