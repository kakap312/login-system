<?php
require_once(dirname(__FILE__).'/../../domain/repository/DrugGroupRepository.php');
require_once(dirname(__FILE__).'/../mappers/DbDrugGroupToDomainMapper.php');
require_once(dirname(__FILE__).'/../../domain/model/DrugGroup.php');
require_once(dirname(__FILE__).'/../../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../../core/domain/Constant.php');
require_once(dirname(__FILE__).'/../db/model/DbDrugGroup.php');
class DrugGroupRepositoryImp  implements DrugGroupRepository {
    private $drugGroupDao;

    public function __construct($drugGroupDao){
        $this->drugGroupDao = $drugGroupDao;
    }
    public function fetchDrugGroups(){
        $dbDrugGroups = $this->drugGroupDao->fetchAllGroups();
        if(is_null($dbDrugGroups)){
            return new Result(null,TWENTY,false);
        }else{
            $drugGroups = array();
            for ($i=0; $i < count($dbDrugGroups) ; $i++) { 
                array_push($drugGroups,DbDrugGroupToDomainMapper::map($dbDrugGroups[$i]));
            }
            return new Result($drugGroups,RECORD_FOUND,true);
        }
    }
    public function fetchDrugGroupByNameOrId($drugNameOrId){
        $dbDrugGroup = $this->drugGroupDao->fetchDrugGroupByNameOrId($drugNameOrId);
        if(is_null($dbDrugGroup)){
            return new Result(null,TWENTY,false);
        }else{
            return new Result(DbDrugGroupToDomainMapper::map($dbDrugGroup),RECORD_FOUND,true);
        }

    }

}