<?php
class DbAccount{
    private $id;
    private $userName;
    private $password;
    private $createdAt;
    private $updatedAt;

    public function __construct($userName,$password,$createdAt,$updatedAt){
        $this->id = "";
        $this->userName = $userName;
        $this->password = $password;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}