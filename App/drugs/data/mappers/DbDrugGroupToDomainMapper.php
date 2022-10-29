<?php
require_once(dirname(__FILE__).'/../../domain/model/DrugGroup.php');
class DbDrugGroupToDomainMapper{

    public static function map($dbDrugGroup){
        return new DrugGroup(
            $dbDrugGroup->getId(),
            $dbDrugGroup->getGroupName()
        );
    }
}