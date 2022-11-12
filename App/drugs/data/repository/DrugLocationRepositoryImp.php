<?php
require_once(dirname(__FILE__).'/../../domain/repository/DrugLocationRepository.php');
require_once(dirname(__FILE__).'/../mappers/DbDrugLocationToDomainMapper.php');
require_once(dirname(__FILE__).'/../../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../../core/domain/Constant.php');
require_once(dirname(__FILE__).'/../../domain/model/DrugLocation.php');
require_once(dirname(__FILE__).'/../db/model/DbDrugLocation.php');
class DrugLocationRepositoryImp implements DrugLocationRepository {
    private $drugLocationDao;

    public function __construct($drugLocationDao){
        $this->drugLocationDao = $drugLocationDao;
    }

    public function fetchDrugLocations(){
        $drugLocations = array();
        $dbDrugLocation = $this->drugLocationDao->fetchAllDrugLocation();
        if(is_null($dbDrugLocation)){
            return new Result(null,TWENTY,false);
        }else{
            for ($i=0; $i < count($dbDrugLocation) ; $i++) { 
                array_push($drugLocations,DbDrugLocationToDomainMapper::map($dbDrugLocation[$i]));
            }
            return new Result($drugLocations,RECORD_FOUND,true);
        }
    }
    public function fetchDrugLocationByNameOrId($drugLocationNameOrId){
        $dbDrugLocation = $this->drugLocationDao->fetchDrugLocationByNameOrId($drugLocationNameOrId);
        if(is_null($dbDrugLocation)){
            return new Result(null,TWENTY,false);
        }else{
            return new Result(DbDrugLocationToDomainMapper::map($dbDrugLocation),RECORD_FOUND,true);
        }
    }

}