<?php
class DomainDrugToDrugTypeUiModelMapper{

    public static function map($drugType){
        return new DrugTypeUiModel(
            $drugType->getId(),
            $drugType->getName()
        );
    }
}