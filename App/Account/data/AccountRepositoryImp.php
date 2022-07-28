<?php
require_once(dirname(__FILE__).'/../domain/repository/AccountRepository.php');
require_once(dirname(__FILE__).'/../../core/domain/Result.php');
require_once(dirname(__FILE__).'/db/model/dbAccount.php');
require_once(dirname(__FILE__).'/db/model/dbQueryResponse.php');

class AccountRepositoryImp implements AccountRepository {
    private $accountDao;

    public function __construct($accountDao)
    {
        $this->accountDao = $accountDao;
    }
    public  function createAccount($savedAccountInfo)
    {
        // check if account name is not taken
        if($this->accountDao->findAccountInstanceByUserName($savedAccountInfo->getUsername())){
            return new Result(null,30);//user account is taken
        }else{
            // hash password and generate an id andthe insert it into database
            $accountCreationResponse = $this->accountDao->insertIntoAccount(new DbAccount(
                "",
                $savedAccountInfo->getUserName(),
                $savedAccountInfo->getPassword(),
                $savedAccountInfo->getFullname(),
                date("dd/mm/yyyy"),
                date("dd/mm/yyyy")
            ));
            if($accountCreationResponse){
                return new Result(null,40); // account created successfully
            }else{
                return new Result(null,50); // Database error, unable to create account
            }

        }
        
    }

    public function Login($credentials)
    {
        if($this->accountDao->findAccountInstanceByUserNameAndPassword($credentials->getUsername(),$credentials->getPassword())){
            return new Result(null,10); //error code 10 means user can login
        }
        return new Result(null,20); // error code 20 means user name can not be found 
    }
}