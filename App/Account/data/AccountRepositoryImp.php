<?php
require_once(dirname(__DIR__,1).'/domain/repository/AccountRepository.php');
require_once(dirname(__DIR__,2).'/core/domain/Result.php');
require_once(dirname(__DIR__,2).'/core/domain/Constant.php');
require_once(dirname(__FILE__).'/db/model/dbAccount.php');
require_once(dirname(__FILE__).'/db/model/dbQueryResponse.php');

class AccountRepositoryImp implements AccountRepository {
    private $accountDao;

    public function __construct($accountDao){$this->accountDao = $accountDao;}

    public function Login($credential)
    {
       return $this->accountDao->findAccountInstanceByUsernameAndPassword(
            $credential->getUsername(),
            $credential->getPassword()
        )?new Result(null,LOGIN_SUCCESS,true): new Result(null,LOGIN_ERROR,false);
    }

    public  function createAccount($savedAccountInfo){
        
    }

     // public  function createAccount($savedAccountInfo)
    // {
    //     // check if account name is not taken
    //     if($this->accountDao->findAccountInstanceByUserName($savedAccountInfo->getUsername())){
    //         return new Result(null,30);//user account is taken
    //     }else{
    //         // hash password and generate an id andthe insert it into database
    //         $accountCreationResponse = $this->accountDao->insertIntoAccount(new DbAccount(
    //             "",
    //             $savedAccountInfo->getUserName(),
    //             $savedAccountInfo->getPassword(),
    //             $savedAccountInfo->getFullname(),
    //             date("dd/mm/yyyy"),
    //             date("dd/mm/yyyy")
    //         ));
    //         if($accountCreationResponse){
    //             return new Result(null,40,true); // account created successfully
    //         }else{
    //             return new Result(null,50,false); // Database error, unable to create account
    //         }

    //     }
        
    // }
}