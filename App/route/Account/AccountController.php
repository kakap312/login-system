
<?php
require_once(dirname(__FILE__).'/../../core/data/di/DependencyInjection.php');
require_once(dirname(__FILE__).'/../../account/domain/model/SavedAccountInfo.php');

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
    function createAccount($savedAccountInfo){
        return $this->accountRepository->createAccount($savedAccountInfo);
    }
    public function validateUsername($username){
       return $this->usernameValidator->validate($username);
    }
    public function validatePassword($password){
       return $this->passwordValidator->validate($password);
    }
    public function validateName($name){
       return $this->nameValidator->validate($name);
    }
}
