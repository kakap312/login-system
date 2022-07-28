<?php
//use Ramsey\Uuid\Uuid;
class DbAccount{
    private $id;
    private $username;
    private $password;
    private $fullname;
    private $createdAt;
    private $updatedAt;

    public function __construct($id,$username,$password,$fullname,$createdAt,$updatedAt){
        if($id==""){
            //generate a new id 
            $this->id= uniqid();
        }else{
            $this->id = $id;
        }
        $this->username = $username;
        $this->password = $password;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->fullname = $fullname;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setFullname($fullname){
        $this->fullname = $fullname;
    }
    public function getFullname(){
        return $this->fullname;
    }
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    public function setUpdatedAt($updatedAt){
        $this->updatedAt = $updatedAt;
    }
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

}