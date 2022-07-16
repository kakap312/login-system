<?php
require_once(dirname(__FILE__).'/../domain/repository/AccountRepository.php');
require_once(dirname(__FILE__).'/../../core/domain/Result.php');
require_once(dirname(__FILE__).'/db/model/dbAccount.php');
require_once(dirname(__FILE__).'/db/model/dbQueryResponse.php');

class AccountRepositoryImp implements AccountRepository {
    private $accountDao;

    public function __construct($accountDao){
        $this->accountDao = $accountDao;
    }
    public  function createAccount($savedAccountInfo)
    {
        $dbQueryResponse = $this->accountDao->insertIntoAccount(new DbAccount(
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

    public function isAccountFound($username,$password){
        $dbQueryResponse  = $this->accountDao->findAccountInstance($username,$password);
        if(!$dbQueryResponse->getError()){
            return new Result($dbQueryResponse->getMessage(),$dbQueryResponse->getData(),$dbQueryResponse->getError());
        }
        return new Result($dbQueryResponse->getMessage(),$dbQueryResponse->getData(),$dbQueryResponse->getError());
    }
}