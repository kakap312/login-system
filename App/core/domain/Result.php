<?php
class Result{
    public $data;
    public $errorCode;

    public function __construct($data,$errorCode){
        $this->data = $data;
        $this->errorCode = $errorCode;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getData($error){
        return $this->data;
    }
    public function setErrorCode($errorCode){
        return $this->errorCode = $errorCode;
    }
    public function getErrorCode(){
        return $this->errorCode;
    }
    
}