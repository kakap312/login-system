<?php
class DrugUiModel implements JsonSerializable{
    private $id;
    private $name;
    private $drugWeight;
    private $drugManufacturer;
    private $drugGroup;
    private $drugLocation;
    private $createdAt;
    private $updatedAt;
    private $drugAmount;
    private $drugType;
    private $childDossage;
    private $adultDossage;
    private $effect;
    private $expiryDate;

    public function __construct(
        $id,$name, 
        $drugLocation, 
        $drugAmount,
        $drugType,
        $childDossage,
        $adultDossage,
        $effect,
        $drugWeight,
        $drugManufacturer,
        $drugGroup,
        $createdAt,
        $updatedAt,
        $expiryDate
        ){
        $this->id = $id;
        $this->name = $name;
        $this->drugLocation = $drugLocation;
        $this->drugAmount = $drugAmount;
        $this->drugType = $drugType;
        $this->childDossage = $childDossage;
        $this->adultDossage = $adultDossage;
        $this->effect = $effect;
        $this->drugWeight = $drugWeight;
        $this->drugManufacturer = $drugManufacturer;
        $this->drugGroup = $drugGroup;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->expiryDate = $expiryDate;
    }

    // public function setId($id){$this->id = $id;}
    // public function getId(){return $this->id;}
    // public function setName($name){$this->name = $name;}
    // public function getName(){return $this->name;}
    // public function setDrugLocaion($drugLocation){$this->drugLocation = $drugLocation;}
    // public function getDrugLocation(){return $this->drugLocation;}
    // public function setDrugAmount(){$this->drugAmount = $drugAmount;}
    // public function getDrugAmount(){return $this->drugAmount;}
    // public function setDrugType($drugType){$this->drugType = $drugType;}
    // public function getDrugType(){return $this->drugType;}
    // public function setChildDossage($childDossage){$this->childDossage = $childDossage;}
    // public function getChildDossage(){return  $this->childDossage; }
    // public function setAdultDossage($adultDossage){$this->adultDossage = $adultDossage;}
    // public function getAdultDossage(){return  $this->adultDossage; }
    // public function setEffect($effect){$this->effect = $effect;}
    // public function getEffect(){return  $this->effect; }

    public function jsonSerialize(){
        $arr = get_object_vars($this);
        return $arr;
    }
}