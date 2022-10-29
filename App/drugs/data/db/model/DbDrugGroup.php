<?php
class DbDrugGroup{
    private $id;
    private $groupName;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$groupName,$createdAt,$updatedAt){
        if($id==""){$this->id= uniqid();}else{$this->id = $id;}
        $this->groupName = $groupName;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}
    public function setGroupName($groupName){$this->groupName=$groupName;}
    public function getGroupName(){return $this->groupName;}
    public function setCreatedAt($createdAt){$this->createdAt=$createdAt;}
    public function getCreatedAt(){return $this->createdAt;}
    public function setUpdatedAt($updatedAt){$this->updatedAt=$updatedAt;}
    public function getUpdatedAt(){return $this->updatedAt;}
    
}