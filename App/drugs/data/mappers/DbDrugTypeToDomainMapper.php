<?php
require_once(dirname(__FILE__).'/../../domain/model/DrugType.php');
class DbDrugTypeToDomainMapper{

    public static function map($dbDrugTypes){
        return new DrugType(
            $dbDrugTypes->getId(),
            $dbDrugTypes->getName()
        );
    }
}