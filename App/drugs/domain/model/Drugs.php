<?php
class Drugs{
    private $id;
    private $locationId;
    private $typeId;
    private $groupId;
    private $name;
    private $amount;
    private $manufacturer;
    private $weight;
    private $expiryDate;
    private $effect;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$locationId,$typeId,$groupId,$name,$amount,$manufacturer,$weight,$expiryDate,$effect,$createdAt,$updatedAt){
        if($id==""){$this->id= uniqid();}else{$this->id = $id;}
        $this->locationId = $locationId;
        $this->typeId = $typeId;
        $this->groupId = $groupId;
        $this->name = $name;
        $this->amount = $amount;
        $this->manufacturer = $manufacturer;
        $this->weight = $weight;
        $this->expiryDate =$expiryDate;
        $this->effect =$effect;
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
    public function setEffect($effect){$this->effect = $effect;}
    public function getEffect(){return $this->effect;}
    public function setManufacturer($manufacturer){$this->manufacturer = $manufacturer;}
    public function getManufacturer(){return $this->manufacturer;}
    public function setCreatedAt($createdAt){$this->createdAt = $createdAt;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt($updatedAt){$this->updatedAt = $updatedAt;}
    public function getUpdatedAt(){return $this->updatedAt;}
}