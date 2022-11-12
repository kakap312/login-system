
<?php
require_once(dirname(__DIR__,2).'/core/data/di/DependencyInjection.php');
require_once(dirname(__DIR__,2).'/account/domain/model/SavedAccountInfo.php');
require_once(dirname(__DIR__,2).'/core/domain/Result.php');
require_once(dirname(__DIR__,2).'/core/domain/Constant.php');

class AccountController{
    private $accountRepository;
    private $usernameValidator;
    private $passwordValidator;
    private $nameValidator;

    public function __construct(){
        $dependencyinjector = new DependencyInjection();
        $this->accountRepository = $dependencyinjector->getAccountRepository();
        $this->usernameValidator = $dependencyinjector->getUserNameValidator();
        $this->passwordValidator = $dependencyinjector->getPasswordValidator();
        $this->nameValidator = $dependencyinjector->getNameValidator();
    }
    function login($credential){
        return $this->accountRepository->login($credential);
    }
    // function createAccount($savedAccountInfo){
    //     return $this->accountRepository->createAccount($savedAccountInfo);
    // }
    public function validateUsername($username){
        if( $this->usernameValidator->validate($username)){
            return new Result(null,USERNAME_SUCCESS,true);
        }else{
             return new Result(null,USERNAME_ERROR,false);
        }
    }
    public function validatePassword($password){
        if( $this->passwordValidator->validate($password)){
            return new Result(null,PASSWORD_SUCCESS,true);
        }else{
             return new Result(null,PASSWORD_ERROR,false);
        }
    }
    // public function validateName($name){
    //    return $this->nameValidator->validate($name);
    // }
}
