<?php
require_once(dirname(__FILE__).'/../../domain/model/DrugLocation.php');
class DbDrugLocationToDomainMapper{

    public static function map($dbDrugLocation){
        return new DrugLocation(
            $dbDrugLocation->getId(),
            $dbDrugLocation->getName()
        );
    }
}