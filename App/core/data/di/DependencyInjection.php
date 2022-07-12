<?php
class DependencyInjection{
    private $dbConnection;
    private $accountRepositoryImp;
    private $accountDao;
    private $userNameValidator;
    private $passwordValidator;

    public function __construct(){
        $this->connection = new DBConnection("root","root","localhost");
        $this->accountDao = new accountDao($this->connection);
        $this->repository = new AccountRepositoryImp($this->accountDao);
        $this->userNameValidator = new UserNameValidation();
        $this->passwordValidator = new PasswordeValidation();
    }
    public static function getAccountRepository(){
        return $this->accountRepositoryImp;
    }
    public static function getAccountDao(){
        return $this->accountDao;
    }
    public static function getDbConnection(){
        return $this->dbConnection;
    }
    public function getUserNameValidator(){
        return $this->userNameValidator;
    }
    public function getPasswordValidator(){
        return $this->PasswordValidator;
    }
}