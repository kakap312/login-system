
<?php
require_once(dirname(__FILE__).'/../../core/data/di/DependencyInjection.php');
require_once(dirname(__FILE__).'/../../account/domain/validators/AccountLoginValidation.php');
require_once(dirname(__FILE__).'/../../account/domain/model/SavedAccountInfo.php');

class AccountController{
    private $accountRepository;
    private $usernameValidator;
    private $passwordValidator;

    public function __construct(){
        $dependencyinjector = new DependencyInjection();
        $this->accountRepository = $dependencyinjector->getAccountRepository();
        $this->usernameValidator = $dependencyinjector->getUserNameValidator();
        $this->passwordValidator = $dependencyinjector->getPasswordValidator();
    }
    function login($credential){
        return $this->accountRepository->isAccountFound($credential->getUsername(),$credential->getPassword());
    }
    function createAccount($savedAccountInfo){
        return $this->accountRepository->createAccount($savedAccountInfo);
    }
    public function validateRegistrationInfo($savedAccountInfo){
        return new AccountRegistrationValidation(
            $this->usernameValidator->validate($savedAccountInfo->getUserName()),
            $this->passwordValidator->validate($savedAccountInfo->getPassword())
        );
    }
    public function validateLoginInfo($savedAccountInfo){
        return  new AccountLoginValidation(
            $this->usernameValidator->validate($savedAccountInfo->getUserName()),
            $this->passwordValidator->validate($savedAccountInfo->getPassword())
        );
    }
}
