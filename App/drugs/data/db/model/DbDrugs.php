<?php 
class DbDrugs{
    private $id;
    private $name;
    private $locationId;
    private $amount;
    private $expiryDate;
    private $weight;
    private $typeId;
    private $groupId;
    private $manufacturer;
    private $effect;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$name,$locationId,$amount,$expiryDate,$weight,$typeId,$groupId,$manufacturer,$effect,$createdAt,$updatedAt){
        if($id==""){$this->id= uniqid();}else{$this->id = $id;}
        $this->name = $name;
        $this->locationId = $locationId;
        $this->amount = $amount;
        $this->expiryDate = $expiryDate;
        $this->weight = $weight;
        $this->typeId = $typeId;
        $this->groupId = $groupId;
        $this->manufacturer = $manufacturer;
        $this->effect = $effect;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name = $name;}
    public function getName(){return $this->name;}
    public function setLocationId($LocationId){$this->locationId = $LocationId;}
    public function getLocationId(){return $this->locationId;}
    public function setAmount($amount){$this->amount = $amount;}
    public function getAmount(){return $this->amount;}
    public function setExpiryDate($expiryDate){$this->expiryDate = $expiryDate;}
    public function getExpiryDate(){return $this->expiryDate;}
    public function setWeight($weight){$this->weight = $weight;}
    public function getWeight(){return $this->weight;}
    public function setTypeId($typeId){$this->typeId = $typeId;}
    public function getTypeId(){return $this->typeId;}
    public function setGroupId($groupId){$this->groupId = $groupId;}
    public function getGroupId(){return $this->groupId;}
    public function setManufacturer($manufacturer){$this->manufacturer = $manufacturer;}
    public function getManufacturer(){return $this->manufacturer;}
    public function setEffect($effect){$this->effect = $effect;}
    public function getEffect(){return $this->effect;}
    public function setCreatedAt($createdAt){$this->createdAt = $createdAt;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt($updatedAt){$this->updatedAt = $updatedAt;}
    public function getUpdatedAt(){return $this->updatedAt;}
}
?>