<?php
class DomainToUiModelMapper{

    public function map(
        $drug,
        $drugLocationName,
        $drugTypeName,
        $drugGroupName,
        $childDossage,
        $adultDossage
    )
    {
        return new DrugUiModel(
            $drug->getId(),
            $drug->getName(),
            $drugLocationName,
            $drug->getAmount(),
            $drugTypeName,
            $childDossage,
            $adultDossage,
            $drug->getEffect(),
            $drug->getWeight(),
            $drug->getManufacturer(),
            $drugGroupName, 
            $drug->getCreatedAt(),
            $drug->getUpdatedAt(),
            $drug->getExpiryDate()
        );
    }
}
