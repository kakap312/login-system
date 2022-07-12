//contail methods for each route
//will make good use of the repository to make a call to the db.
<?php
class AccountController{
    private $accountRepository;
    private $usernameValidator;
    private $passwordValidator;

    public function __construct(){
        $this->accountRepository = DependencyInjection::getAccountRepository();
        $this->usernameValidator = DependencyInjection::getUserNameValidator();
        $this->passwordValidator = DependencyInjection::getPasswordValidator();
    }
    function login($credential){
        return $accountRepository->isAccountFound($credential);
    }
    function createAccount($savedAccountInfo){
        return $accountRepository->createAccount($savedAccountInfo);
    }
    public function validateRegistrationInfo($savedAccountInfo){
        return new AccountRegistrationValidation(
            $this->usernameValidator->validateUsername($savedAccountInfo->getUserName()),
            $this->passwordValidator->validatePassword($savedAccountInfo->getPassword())
        );
    }
    public function validateLoginInfo(){
        return new AccountLoginValidation(
            $this->usernameValidator->validateUsername($savedAccountInfo->getUserName()),
            $this->passwordValidator->validatePassword($savedAccountInfo->getPassword())
        );
    }
}
