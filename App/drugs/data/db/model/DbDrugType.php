<?php
class DbDrugType{
    private $id;
    private $name;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$name,$createdAt,$updatedAt){
        if($id==""){$this->id= uniqid();}else{$this->id = $id;}
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setName($name){$this->name=$name;}
    public function getName(){return $this->name;}
    public function setCreatedAt($createdAt){$this->createdAt=$createdAt;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt($updatedAt){$this->updatedAt=$updatedAt;}
    public function getUpdatedAt(){return $this->updatedAt;}
    
}