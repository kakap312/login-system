<?php
require_once(dirname(__FILE__).'/../domain/repository/AccountRepository.php');
require_once(dirname(__FILE__).'/../../core/data/domain/Result.php');
require_once(dirname(__FILE__).'/db/model/dbAccount.php');
require_once(dirname(__FILE__).'/db/model/dbQueryResponse.php');

class AccountRepositoryImp implements AccountRepository {
    private $dao;

    public function __construct($dao){
        $this->dao = $dao;
    }
    public  function createAccount($savedAccountInfo)
    {
        $dbQueryResponse = $this->dao->insertIntoAccount(new DbAccount(
                $savedAccountInfo->getUserName(),
                $savedAccountInfo->getPassword(),
                date("dd/mm/yyyy"),
                date("dd/mm/yyyy")
            )
        );
        if(!$dbQueryResponse->getError()){
            return new Result($dbQueryResponse->getMessage(),$dbQueryResponse->getData());
        }
        return new Result($dbQueryResponse->getMessage(),$dbQueryResponse->getData());
    }

    public function isAccountFound($username){
        $dbQueryResponse  = $this->dao->findAccountInstance($username);
        if(!$dbQueryResponse->getError()){
            return new Result($dbQueryResponse->getMessage(),$dbQueryResponse->getData());
        }
        return new Result($dbQueryResponse->getMessage(),$dbQueryResponse->getData());
    }
}