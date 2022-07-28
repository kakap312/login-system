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
        if($this->dbConnection->query($insertStatment) === true){
            return true;
        }else{
            return false;
        }  
    }
    
    public function findAccountInstanceByUserNameAndPassword($username,$password){
        $insertStatment = "SELECT * FROM accounts where username='$username' and password='$password';";
        if($this->dbConnection->query($insertStatment)->num_rows > 0){
            return true ;
        }
        return false;
    }
    public function findAccountInstanceByUserName($username){
        $insertStatment = "SELECT * FROM accounts where username='$username';";
        if($this->dbConnection->query($insertStatment)->num_rows > 0){
            return true ;
        }
        return false;

    }
}