<?php
class SavedDrugInfo{
    private $name;
    private $locationId;
    private $amount;
    private $expiryDate;
    private $weight;
    private $groupId;
    private $type;
    private $manufacturer;
    private $effect;
    private $adultDossage;
    private $childDossage;
    private $createdAt;
    private $updatedAt;
   

    public function __construct($name,$locationId,$amount,$expiryDate,$weight,$groupId,$type,$manufacturer,$effect,$adultDossage,$childDossage,$createdAt,$updatedAt){
        $this->name = $name;
        $this->locationId  = $locationId;
        $this->amount = $amount;
        $this->expiryDate = $expiryDate;
        $this->weight = $weight;
        $this->groupId = $groupId;
        $this->type = $type;
        $this->manufacturer = $manufacturer;
        $this->effect = $effect;
        $this->adultDossage = $adultDossage;
        $this->childDossage = $childDossage;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function setName($newName){$this->name = $newName;}
    public function getName(){return $this->name;}
    public function setLocationId($newLocation){$this->locationId = $newLocation;}
    public function getLocationId(){return $this->locationId;}
    public function setAmount($newAmount){$this->amount = $newAmount;}
    public function getAmount(){return $this->amount;}
    public function setExpiryDate($newExpiryDate){$this->expiryDate = $newExpiryDate;}
    public function getExpiryDate(){return $this->expiryDate;}
    public function setWeight($newWeight){$this->weight = $newWeight;}
    public function getWeight(){return $this->weight;}
    public function setGroupId($newGroupId){$this->groupId = $newGroupId;}
    public function getGroupId(){return $this->groupId;}
    public function setType($newType){$this->type = $newType;}
    public function getType(){return $this->type;}
    public function setManufacturer($newManufacturer){$this->manufacturer = $newManufacturer;}
    public function getManufacturer(){return $this->manufacturer;}
    public function setEffect($effect){$this->effect = $effect;}
    public function getEffect(){return $this->effect;}
    public function setCreatedAt($newDate){$this->createdAt = $newDate;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt($newDate){$this->updatedAt = $newDate;}
    public function getUpdatedAt(){return $this->updatedAt;}
    public function setAdultDossage($adultDossage){$this->adultDossage = $adultDossage;}
    public function getAdultDossage(){return $this->adultDossage;}
    public function setChildDossage($childDossage){$this->childDossage = $childDossage;}
    public function getChildDossage(){return $this->childDossage;}
}

