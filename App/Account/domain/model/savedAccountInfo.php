<?php

class SavedAccountInfo{
    private $userName;
    private $password;
    public function __construct($userName,$password){
        $this->userName = $userName;
        $this->password = $password;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
}