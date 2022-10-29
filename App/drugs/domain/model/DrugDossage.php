<?php
class DrugDossage{
    private $id;
    private $dossage;

    public function __construct($id,$dossage){
        $this->id = $id;
        $this->dossage = $dossage;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setDossage($dossage){
        $this->dossage = $dossage;
    }
    public function getDossage(){
        return $this->dossage;
    }

}