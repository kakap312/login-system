<?php
require_once(dirname(__FILE__).'/../../drugs/data/di/DrugsDi.php');
require_once(dirname(__FILE__).'/../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/model/DrugUiModel.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/model/DrugLocationUiModel.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/model/DrugGroupUiModel.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/model/DrugTypeUiModel.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/mappers/DomainDrugToDrugTypeUiMapper.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/mappers/DomainDrugToDrugLocationUiMapper.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/mappers/DomainDrugToDrugGroupUiMapper.php');
require_once(dirname(__FILE__).'/../../drugs/presentation/mappers/DomainToUiModelMapper.php');
class DrugsController{
    private $drugRepository;
    private $drugDossageRepository;
    private $drugTypeRepository;
    private $drugLocationRepository;
    private $drugGroupRepository;
    private $diseaseCategoryId;

    public function __construct()
    {
        $drugsDi = new DrugsDi();
        $this->drugRepository = $drugsDi->getDrugsRepository();
        $this->drugDossageRepository = $drugsDi->getDrugDossageRepository();
        $this->drugTypeRepository = $drugsDi->getDrugTypeRepository();
        $this->drugLocationRepository = $drugsDi->getDrugLocationRepository();
        $this->drugGroupRepository = $drugsDi->getDrugGroupRepository();
    }
    public function createDrugs($savedDrugsInfo)
    { 
        $searchDrugsByNameAndManufacturerAndTypeResult = $this->searchDrugsByNameAndManufacturerAndType($savedDrugsInfo->getName(),$savedDrugsInfo->getManufacturer(),$this->searchDrugTypeByNameOrId($savedDrugsInfo->getType())->getData()->getId());
        if($searchDrugsByNameAndManufacturerAndTypeResult->getSuccess()){
            return new Result(null,SEVENTY,false);
        }else{
            $drugcreationResult = $this->drugRepository->createDrug(new DbDrugs(
                "",
                $savedDrugsInfo->getName(),
                $this->searchDrugLocationByNameOrId($savedDrugsInfo->getLocationId())->getData()->getId(),
                $savedDrugsInfo->getAmount(),
                $savedDrugsInfo->getExpiryDate(),
                $savedDrugsInfo->getWeight(),
                $this->searchDrugTypeByNameOrId($savedDrugsInfo->getType())->getData()->getId(),
                $this->searchDrugGroupByNameOrId($savedDrugsInfo->getGroupId())->getData()->getId(),
                $savedDrugsInfo->getManufacturer(),
                $savedDrugsInfo->getEffect(),
                $savedDrugsInfo->getCreatedAt(),
                $savedDrugsInfo->getCreatedAt()
            ));
            $drug = $this->searchDrugsByNameAndManufacturerAndType($savedDrugsInfo->getName(),$savedDrugsInfo->getManufacturer(),$this->searchDrugTypeByNameOrId($savedDrugsInfo->getType())->getData()->getId())->getData();
            $createDrugDossageCreationResult =$this->createDrugsDossage($drug->getId(),[new SavedDrugDossageInfo("adult",$savedDrugsInfo->getAdultDossage()),new SavedDrugDossageInfo("child",$savedDrugsInfo->getChildDossage())]);
            return $createDrugDossageCreationResult->getSuccess() && $drugcreationResult->getSuccess()?$drugcreationResult:new Result(null,SIXTY,false);
        }
    }
    public function updateDrug($id,$savedDrugsInfo){
            $drugcreationResult = $this->drugRepository->updateDrug(new DbDrugs(
                $id,
                $savedDrugsInfo->getName(),
                $this->searchDrugLocationByNameOrId($savedDrugsInfo->getLocationId())->getData()->getId(),
                $savedDrugsInfo->getAmount(),
                $savedDrugsInfo->getExpiryDate(),
                $savedDrugsInfo->getWeight(),
                $this->searchDrugTypeByNameOrId($savedDrugsInfo->getType())->getData()->getId(),
                $this->searchDrugGroupByNameOrId($savedDrugsInfo->getGroupId())->getData()->getId(),
                $savedDrugsInfo->getManufacturer(),
                $savedDrugsInfo->getEffect(),
                $savedDrugsInfo->getCreatedAt(),
                $savedDrugsInfo->getCreatedAt()
            ));
            $updateDrugDossageCreationResult =$this->updateDrugsDossage($id,[new SavedDrugDossageInfo("adult",$savedDrugsInfo->getAdultDossage()),new SavedDrugDossageInfo("child",$savedDrugsInfo->getChildDossage())]);
            return $drugcreationResult->getSuccess() &&  $updateDrugDossageCreationResult->getSuccess()?$drugcreationResult:new Result(null,HUNDRED_TEN,false);
    }
    public function searchDrugs($name)
    {
        $result = $this->drugRepository->searchDrugsByName($name);
        if($result->getSuccess()){
            $viewDrugsUiModelList = array();
            $drugs = $result->getData();
            foreach ($drugs as $drug) { 
                array_push($viewDrugsUiModelList,DomainToUiModelMapper::map(
                    $drug,
                    $this->searchDrugLocationByNameOrId($drug->getLocationId())->getData()->getName(),
                    $this->searchDrugTypeByNameOrId($drug->getTypeId())->getData()->getName(),
                    $this->searchDrugGroupByNameOrId($drug->getGroupId())->getData()->getName(),
                    $this->searchDrugDossageByIdAndAgeGroup($drug->getId(),"child")->getData()->getDossage(),
                    $this->searchDrugDossageByIdAndAgeGroup($drug->getId(),"adult")->getData()->getDossage()
                ));
            }
            $result->setData($viewDrugsUiModelList);
            return $result;
        }else{
            return $result;
        }
        
    }
    public function viewDrugs()
    {
        $result = $this->drugRepository->fetchDrugs();
        if($result->getSuccess()){
            $viewDrugsUiModelList = array();
            $drugs = $result->getData();
            foreach ($drugs as $drug) { 
                array_push($viewDrugsUiModelList,DomainToUiModelMapper::map(
                    $drug,
                    $this->searchDrugLocationByNameOrId($drug->getLocationId())->getData()->getName(),
                    $this->searchDrugTypeByNameOrId($drug->getTypeId())->getData()->getName(),
                    $this->searchDrugGroupByNameOrId($drug->getGroupId())->getData()->getName(),
                    $this->searchDrugDossageByIdAndAgeGroup($drug->getId(),"child")->getData()->getDossage(),
                    $this->searchDrugDossageByIdAndAgeGroup($drug->getId(),"adult")->getData()->getDossage()
                    
                ));
            }
            $result->setData($viewDrugsUiModelList);
            return $result;
            }else{
                return $result;
            }
    }
    public function viewDrug($id)
    {
        $result = $this->searchDrugNameOrId($id);
        if($result->getSuccess()){
            $drug = $result->getData();
            $drugUiModel =  DomainToUiModelMapper::map(
                $drug,
                $this->searchDrugLocationByNameOrId($drug->getLocationId())->getData()->getName(),
                $this->searchDrugTypeByNameOrId($drug->getTypeId())->getData()->getName(),
                $this->searchDrugGroupByNameOrId($drug->getGroupId())->getData()->getName(),
                $this->searchDrugDossageByIdAndAgeGroup($drug->getId(),"child")->getData()->getDossage(),
                $this->searchDrugDossageByIdAndAgeGroup($drug->getId(),"adult")->getData()->getDossage()
            );
            $result->setData($drugUiModel);
            return $result; 
        }else{
            return $result;
        } 
    }
    public function retrieveDrugType()
    {
        $drugTypesResult = $this->drugTypeRepository->fetchDrugTypes();
        if($drugTypesResult->getSuccess()){
            $drugTypeUiModelList = array();
            $drugTypes = $drugTypesResult->getData();
            foreach ($drugTypes as $drugType) { 
                array_push($drugTypeUiModelList,DomainDrugToDrugTypeUiModelMapper::map($drugType));
            }
            $drugTypesResult->setData($drugTypeUiModelList);
            return $drugTypesResult;
        }else{return $drugTypesResult;}
    }
    public function retrieveDrugLocation()
    {
        $drugLocationResult= $this->drugLocationRepository->fetchDrugLocations();
        if($drugLocationResult->getSuccess()){
            $drugLocationsUiModelList = array();
            $drugLocations = $drugLocationResult->getData();
            foreach ($drugLocations as $drugLocation) { 
                array_push($drugLocationsUiModelList, DomainDrugToDrugLocationUiMapper::map($drugLocation));
            }
            $drugLocationResult->setData($drugLocationsUiModelList);
            return $drugLocationResult;
        }else{return $drugLocationResult;}
    }
    public function retriveDrugGroups()
    {
        $drugGroupsResult = $this->drugGroupRepository->fetchDrugGroups();
        if($drugGroupsResult->getSuccess()){
            $drugGroupUiModelList = array();
            $drugGroups = $drugGroupsResult->getData();
            foreach ($drugGroups as $drugGroup) { 
                array_push($drugGroupUiModelList, DomainDrugToDrugGroupUiMapper::map($drugGroup));
            }
            $drugGroupsResult->setData($drugGroupUiModelList);
            return $drugGroupsResult;
        }else{return $drugGroupsResult;}
    }
    public function searchDrugTypeByNameOrId($nameOrId){ return $this->drugTypeRepository->fetchDrugTypeByNameOrId($nameOrId);}
    public function searchDrugLocationByNameOrId($name){return $this->drugLocationRepository->fetchDrugLocationByNameOrId($name);}
    public function searchDrugGroupByNameOrId($nameOrId){return $this->drugGroupRepository->fetchDrugGroupByNameOrId($nameOrId);}
    public function searchDrugDossageByIdAndAgeGroup($drugid,$ageGroup){ return $this->drugDossageRepository->fetchDrugDossageByIdAndAgeGroup($drugid,$ageGroup);}
    public function getTotalDrugs(){return $this->drugRepository->getTotalNumberOfDrugs();}
    public function deleteDrug($id){return $this->drugRepository->deleteDrug($id);}
    public function createDrugsDossage($drugid,$listOfSavedDrugsDossageInfo){ return $this->drugDossageRepository->createDrugDossage($drugid,$listOfSavedDrugsDossageInfo);}
    public function updateDrugsDossage($drugid,$listOfSavedDrugsDossageInfo){ return $this->drugDossageRepository->updateDrugDossage($drugid,$listOfSavedDrugsDossageInfo);}
    public function searchDrugNameOrId($name){return $this->drugRepository->searchDrugByNameOrId($name);}
    public function searchDrugsByNameAndManufacturerAndType($name,$manufacturer,$type){return $this->drugRepository->searchDrugByNameAndManufacturerAndType($name,$manufacturer,$type);}
    
}