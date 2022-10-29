<?php
class SavedDrugDossageInfo{
    private $ageGroup;
    private $dossage;

    public function __construct($ageGroup,$dossage){
        $this->ageGroup = $ageGroup;
        $this->dossage = $dossage;
    }
    public function setAgeGroup($ageGroup){$this->ageGroup = $ageGroup;}
    public function getAgeGroup(){return $this->ageGroup;}
    public function setDossage($dossage){$this->dossage = $dossage;}
    public function getDossage(){return $this->dossage;}
}