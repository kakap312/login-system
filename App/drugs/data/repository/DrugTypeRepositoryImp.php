<?php
require_once(dirname(__FILE__).'/../../domain/repository/DrugTypeRepository.php');
require_once(dirname(__FILE__).'/../mappers/DbDrugTypeToDomainMapper.php');
require_once(dirname(__FILE__).'/../../domain/model/DrugType.php');
require_once(dirname(__FILE__).'/../db/model/DbDrugType.php');
require_once(dirname(__FILE__).'/../../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../../core/domain/Constant.php');
class DrugTypeRepositoryImp implements DrugTypeRepository {
    private $drugTypeDao;

    public function __construct($drugTypeDao){
        $this->drugTypeDao = $drugTypeDao;
    }

    public function fetchDrugTypes(){
        
        $dbDrugTypes = $this->drugTypeDao->fetchAllDrugType();
        if(is_null($dbDrugTypes)){
            $drugTypes = array();
            return new Result(null,TWENTY,false);
        }else{
            $drugTypes = array();
            for ($i=0; $i < count($dbDrugTypes) ; $i++) { 
                array_push($drugTypes,DbDrugTypeToDomainMapper::map($dbDrugTypes[$i]));
            }
            return new Result($drugTypes,FIFTY,true);
        }
    }
    public function fetchDrugTypeByNameOrId($drugNameOrId){
        $dbDrugType = $this->drugTypeDao->fetchDrugTypeByNameOrId($drugNameOrId);
        if(is_null($dbDrugType)){
            return new Result(null,TWENTY,false);
        }else{
            return new Result(DbDrugTypeToDomainMapper::map($dbDrugType),FIFTY,true);
        }
    }
}