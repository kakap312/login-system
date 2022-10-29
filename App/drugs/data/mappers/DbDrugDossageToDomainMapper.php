<?php
require_once(dirname(__FILE__).'/../../domain/model/DrugDossage.php');
class DbDrugDossageToDomainMapper{

    public function map($dbDrugDossage){
        return new DrugDossage(
            $dbDrugDossage->getDossageId(),
            $dbDrugDossage->getDossage()
        );
    }
}