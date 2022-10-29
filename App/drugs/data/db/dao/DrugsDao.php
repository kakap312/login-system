<?php
class DrugsDao{
    private $dbConnection;
    public function __construct($dbConnection){$this->dbConnection = $dbConnection;}
    public function insert($dbDrugs)
    {
        $drugId = $dbDrugs->getId();
        $drugLocation = $dbDrugs->getLocationId();
        $drugName = $dbDrugs->getName();
        $drugAmount = $dbDrugs->getAmount();
        $expiryDate =$dbDrugs->getExpiryDate();
        $weight =$dbDrugs->getWeight();
        $groupId =$dbDrugs->getGroupId();
        $manufacturer =$dbDrugs->getManufacturer();
        $effect =$dbDrugs->getEffect();
        $drugTypeId = $dbDrugs->getTypeId();
        $createdAt =$dbDrugs->getCreatedAt();
        $updatedAt=$dbDrugs->getUpdatedAt();
        $queryStatement = "insert into drugs values
        ('$drugId','$drugName','$drugLocation','$drugAmount','$expiryDate','$weight','$drugTypeId','$groupId','$manufacturer','$effect','$createdAt','$updatedAt')";
        if($this->dbConnection->query($queryStatement)){return true;}else{return false;}
        $this->dbConnection->close();
    }
    public function updateDrug($dbDrugs){
        $drugId = $dbDrugs->getId();
        $drugLocation = $dbDrugs->getLocationId();
        $drugName = $dbDrugs->getName();
        $drugAmount = $dbDrugs->getAmount();
        $expiryDate =$dbDrugs->getExpiryDate();
        $weight =$dbDrugs->getWeight();
        $groupId =$dbDrugs->getGroupId();
        $manufacturer =$dbDrugs->getManufacturer();
        $effect =$dbDrugs->getEffect();
        $drugTypeId = $dbDrugs->getTypeId();
        $updatedAt=$dbDrugs->getUpdatedAt();
        $queryStatement = "UPDATE  drugs SET name='$drugName' ,location_id ='$drugLocation',amount='$drugAmount',
        expiry_date ='$expiryDate',weight='$weight' , type_id ='$drugTypeId', group_id='$groupId', manufacturer='$manufacturer',
        effect='$effect', updated_at='$updatedAt' WHERE drug_id='$drugId' ";
         if($this->dbConnection->query($queryStatement)){return true;}else{return false;}
        $this->dbConnection->close();
    }
    public function findDrugByNameOrId($drugNameOrId)
    {
        $queryStatement = "SELECT * from drugs where  name='$drugNameOrId' OR drug_id='$drugNameOrId'";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new DbDrugs(
                $record['drug_id'],
                $record['name'],
                $record['location_id'],
                $record['amount'],
                $record['expiry_date'],
                $record['weight'],
                $record['type_id'],
                $record['group_id'],
                $record['manufacturer'],
                $record['effect'],
                $record['created_at'],
                $record['updated_at']
            );
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    public function findDrugById($id)
    {
        $queryStatement = "SELECT * from drugs where  drug_id ='$id'";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new DbDrugs(
                $record['drug_id'],
                $record['name'],
                $record['location_id'],
                $record['amount'],
                $record['expiry_date'],
                $record['weight'],
                $record['type_id'],
                $record['group_id'],
                $record['manufacturer'],
                $record['effect'],
                $record['created_at'],
                $record['updated_at']
            );
        }else{
            return null;
        }
        $this->dbConnection->close();
    }

    public function findAllDrugs(){
        $listOfDbDRugs = array();
        $queryStatement = "SELECT * from drugs ORDER BY name ASC";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows > 0){
            while($record = $dbResult->fetch_assoc()){
                array_push($listOfDbDRugs,new DbDrugs(
                    $record['drug_id'],
                    $record['name'],
                    $record['location_id'],
                    $record['amount'],
                    $record['expiry_date'],
                    $record['weight'],
                    $record['type_id'],
                    $record['group_id'],
                    $record['manufacturer'],
                    $record['effect'],
                    $record['created_at'],
                    $record['updated_at']
                ));
            }
            return $listOfDbDRugs;
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    public function findDrugsByName($drugName){
        $drugs = array();
        $queryStatement = "SELECT * from drugs where  name  lIKE '$drugName%'";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows > 0){
            while($record = $dbResult->fetch_assoc()){
                array_push($drugs,new DbDrugs(
                    $record['drug_id'],
                    $record['name'],
                    $record['location_id'],
                    $record['amount'],
                    $record['expiry_date'],
                    $record['weight'],
                    $record['type_id'],
                    $record['group_id'],
                    $record['manufacturer'],
                    $record['effect'],
                    $record['created_at'],
                    $record['updated_at']
                ));
            }
            return $drugs;
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    function findDrugByNameAndManufacturerAndType($name,$manufacturer,$type){
        $queryStatement = "SELECT * from drugs where  name='$name' AND manufacturer='$manufacturer' AND type_id='$type' ";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows == 1){
            $record = $dbResult->fetch_assoc();
            return new DbDrugs(
                $record['drug_id'],
                $record['name'],
                $record['location_id'],
                $record['amount'],
                $record['expiry_date'],
                $record['weight'],
                $record['type_id'],
                $record['group_id'],
                $record['manufacturer'],
                $record['effect'],
                $record['created_at'],
                $record['updated_at']
            );
        }else{
            return null;
        } 
    }
    function findTotalNumberOfDrugs(){
        $queryStatement = "SELECT * from drugs";
        $dbResult = $this->dbConnection->query($queryStatement);
        if($dbResult->num_rows > 0){
            return $dbResult->num_rows;
        }else{
            return null;
        }
        $this->dbConnection->close();
    }
    function deleteDrugById($id){
        $queryStatement = "DELETE FROM drugs where drug_id='$id'";
        if($this->dbConnection->query($queryStatement)){return true;}else{return false;}
         $this->dbConnection->close();
    }
}