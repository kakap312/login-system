<?php
class DomainDrugTODrugLocationUiMapper{

    public static function map($drugLocation){
        return new DrugLocationUiModel(
            $drugLocation->getId(),
            $drugLocation->getName()
        );
    }
}