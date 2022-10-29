<?php
class DomainDrugTODrugGroupUiMapper{

    public static function map($drugGroup){
        return new DrugGroupUiModel(
            $drugGroup->getId(),
            $drugGroup->getName()
        );
    }
}