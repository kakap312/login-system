<?php
class AccountDao{
    private $dbConnection;

    public function __construct($dbConnection){
        $this->dbConnection = $dbConnection;
    }
    public function insertIntoAccount($dbAccount){
        $insertStatment = "INSERT INTO Accounts(id,username,password,createdAt)VALUE($dbAccount->getId(),$dbAccount->getUserName(),$dbAccount->getPassword(),$dbAccount->getCreatedAt(),'')";
        if($this->findAccountInstance($dbAccount->getUserName())->getError()){
            return new DbQueryResponse(false,null,"username taken");
        }else{
            if($this->dbConnection->query($insertStatment) === true){return new DbQueryResponse(true,null,"created successfully");}  
        }
        return new DbQueryResponse(false,null,"Please check your network and try again");
    }
    
    public function findAccountInstance($userName){
        $insertStatment = "SELECT * FROM accounts where username='$userName'";
        if(!$this->dbConnection->query($insertStatment)->num_rows > 0){
            return  new DbQueryResponse(true,null,"account found");
        }
        return new DbQueryResponse(false,false,"account not found");
    }
}