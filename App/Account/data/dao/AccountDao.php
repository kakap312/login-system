<?php
require_once(dirname(__FILE__).'/../db/model/dbAccount.php');
class AccountDao{
    private $dbConnection;

    public function __construct($dbConnection){
        $this->dbConnection = $dbConnection;
    }
    public function insertIntoAccount($dbAccount){
        $id = $dbAccount->getId();
        $username = $dbAccount->getUserName();
        $password = $dbAccount->getPassword();
        $createdAt = $dbAccount->getCreatedAt();
        $updatedAt = $dbAccount->getUpdatedAt();
        $fullname = $dbAccount->getFullname();
        $insertStatment = "INSERT INTO accounts(account_id,created_at,fullname,username,password,updated_at)VALUE('$id','$createdAt','$fullname','$username','$password','$updatedAt')";
        return $this->dbConnection->query($insertStatment) === true ?  true:  false; 
    }
    
    public function findAccountInstanceByUsernameAndPassword($username,$password){
        $insertStatment = "SELECT * FROM accounts where username='$username' and password='$password';";
        return $this->dbConnection->query($insertStatment)->num_rows > 0?  true: false;
    }

    public function findAccountInstanceByUserName($username){
        $insertStatment = "SELECT * FROM accounts where username='$username';";
       return $this->dbConnection->query($insertStatment)->num_rows > 0 ?  true: false;
    }
}