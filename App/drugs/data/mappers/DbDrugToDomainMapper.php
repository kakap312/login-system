<?php
require_once(dirname(__FILE__).'/../../domain/model/Drugs.php');
class DbDrugToDomainMapper{
    function map($dbDrug){
        return new Drugs(
            $dbDrug->getId(),
            $dbDrug->getLocationId(),
            $dbDrug->getTypeId(),
            $dbDrug->getGroupId(),
            $dbDrug->getName(),
            $dbDrug->getAmount(),
            $dbDrug->getManufacturer(),
            $dbDrug->getWeight(),
            $dbDrug->getExpiryDate(),
            $dbDrug->getEffect(),
            $dbDrug->getCreatedAt(),
            $dbDrug->getUpdatedAt()
        );
    }
}
