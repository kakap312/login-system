<?php
class DbDrugDossage{
    private $dossageId;
    private $drugId;
    private $ageGroup;
    private $dossage;

    public function __construct($dossageId,$drugId,$ageGroup,$dossage){
        if($dossageId == ""){$this->dossageId= uniqid();}else{$this->dossageId = $dossageId;}
        $this->drugId = $drugId;
        $this->ageGroup = $ageGroup;
        $this->dossage = $dossage;
    }
    public function setDossageId($id){$this->dossageId = $id;}
    public function getDossageId(){return $this->dossageId;}
    public function setDrugId($id){$this->drugId = $id;}
    public function getDrugId(){return $this->drugId;}
    public function setAgeGroup($ageGroup){$this->ageGroup = $ageGroup;}
    public function getAgeGroup(){return $this->ageGroup;}
    public function setDossage($dossage){$this->dossage = $dossage;}
    public function getDossage(){return $this->dossage;}


}