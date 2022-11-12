<?php
require_once(dirname(__FILE__).'/../mappers/DbDrugToDomainMapper.php');
require_once(dirname(__FILE__).'/../../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../../core/domain/Constant.php');
require_once(dirname(__FILE__).'/../../domain/repository/DrugsRepository.php');
require_once(dirname(__FILE__).'/../db/model/DbDrugs.php');
require_once(dirname(__FILE__).'/../../domain/model/SavedDrugInfo.php');
class DrugsRepositoryImp implements DrugsRepository{
    private $drugsDao;

    public function __construct($drugsDao){
        $this->drugsDao = $drugsDao;
    }
    function createDrug($savedDrugsInfo)
    {
        if($this->drugsDao->insert($savedDrugsInfo)){return new Result(null,TEN,true);}else{return new Result(null,SIXTY,false);}
        
    }
    public function updateDrug($savedDrugsInfo)
    {
        if($this->drugsDao->updateDrug($savedDrugsInfo)){return new Result(null,THIRTY,true);}else{return new Result(null,HUNDRED_TEN,false);}
    }
    function searchDrugByNameOrId($drugNameOrId)
    {
        $dbDrug = $this->drugsDao->findDrugByNameOrId($drugNameOrId);
        if(is_null($dbDrug)){
            return new Result(null,TWENTY,false);
        }else{
            return new Result(DbDrugToDomainMapper::map($dbDrug),FIFTY,true);
        }
        return DbDrugToDomainMapper::map($dbDrug);

    }
    function searchDrugById($id){
        $dbDrug = $this->drugsDao->findDrugById($id);
        if(is_null($dbDrug)){
            return new Result(null,TWENTY,false);
        }else{
            return new Result(DbDrugToDomainMapper::map($dbDrug),FIFTY,true);
        }
    }
    function searchDrugByNameAndManufacturerAndType($name,$manufacturer,$type){
        $dbDrug = $this->drugsDao->findDrugByNameAndManufacturerAndType($name,$manufacturer,$type);
        if(is_null($dbDrug)){
            return new Result(null,SEVENTY,false);
        }else{
            return new Result(DbDrugToDomainMapper::map($dbDrug),FIFTY,true);
        } 
    }
    function fetchDrugs()
    {
        $drugs = array();
        $dbDrugs = $this->drugsDao->findAllDrugs();
        if(is_null($dbDrugs)){
            return new Result(null,TWENTY,false);
        }else{
            for ($i=0; $i <count($dbDrugs); $i++) { 
                array_push($drugs,DbDrugToDomainMapper::map($dbDrugs[$i]));
            }
            return new Result($drugs,RECORD_FOUND,true);;
        }
    }
    function searchDrugsByName($name)
    {
        $drugs = array();
        $dbDrugs = $this->drugsDao->findDrugsByName($name);
        if(is_null($dbDrugs)){
            return new Result(null,TWENTY,false);
        }else{
            for ($i=0; $i <count($dbDrugs) ; $i++) { 
                array_push($drugs,DbDrugToDomainMapper::map($dbDrugs[$i]));
             }
            return new Result($drugs,FIFTY,true);
        }
    }
    function getTotalNumberOfDrugs(){ 
        $totalNumberOfDrugs = $this->drugsDao->findTotalNumberOfDrugs();
        if(is_null($totalNumberOfDrugs)){
            return new Result(null,TWENTY,false);
        }else{
            return new Result($totalNumberOfDrugs,RECORD_FOUND,true);
        }
    }
    function deleteDrug($id){
        if($this->drugsDao->deleteDrugById($id)){
            return new Result(null,EIGHTY,true);
        }else{
            return new Result(null,NINETY,false);
        }
    }
}