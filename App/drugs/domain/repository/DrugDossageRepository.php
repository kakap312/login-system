<?php
interface DrugDossageRepository{
    public function createDrugDossage($drugId,$savedDrugDossage);
    public function updateDrugDossage($drugId,$savedDrugDossage);
    public function fetchDrugDossageByIdAndAgeGroup($drugId,$ageGroup);
}