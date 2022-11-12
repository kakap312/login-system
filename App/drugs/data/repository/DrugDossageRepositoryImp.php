<?php
require_once(dirname(__FILE__).'/../../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../domain/repository/DrugDossageRepository.php');
require_once(dirname(__FILE__).'/../db/model/DbDrugDossage.php');
require_once(dirname(__FILE__).'/../../domain/model/SavedDrugDossageInfo.php');
require_once(dirname(__FILE__).'/../mappers/DbDrugDossageToDomainMapper.php');
require_once(dirname(__FILE__).'/../../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../../core/domain/Constant.php');

class DrugDossageRepositoryImp implements DrugDossageRepository {
    private $drugsDossageDao;

    public function __construct($drugsDossageDao){$this->drugsDossageDao = $drugsDossageDao;}

    public function createDrugDossage($drugId,$listOfSavedDrugDossage){
        $result = false;
        for ($i=0; $i < count($listOfSavedDrugDossage); $i++) { 
           $result =  $this->drugsDossageDao->insert(new DbDrugDossage(
            "",
            $drugId,
            $listOfSavedDrugDossage[$i]->getAgeGroup(),
            $listOfSavedDrugDossage[$i]->getDossage()
           ));
        }
        return $result?new Result(null,TEN,true):new Result(null,SIXTY,false);
    }
    public function updateDrugDossage($drugId,$listOfSavedDrugDossage){
        $result = false;
        for ($i=0; $i < count($listOfSavedDrugDossage); $i++) { 
           $result =  $this->drugsDossageDao->update(new DbDrugDossage(
            "",
            $drugId,
            $listOfSavedDrugDossage[$i]->getAgeGroup(),
            $listOfSavedDrugDossage[$i]->getDossage()
           ));
        }
        return $result?new Result(null,TEN,true):new Result(null,SIXTY,false);
    }
    public function fetchDrugDossageByIdAndAgeGroup($drugId,$ageGroup){
        $dbDrugDossage = $this->drugsDossageDao->searchDrugDossageByDrugIdAndAgeGroup($drugId,$ageGroup);
        return is_null($dbDrugDossage)? new Result(null,TWENTY,false):new Result(DbDrugDossageToDomainMapper::map($dbDrugDossage),RECORD_FOUND,true);
    }
}