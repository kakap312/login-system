<?php
class Result{
    public $message;
    public $data;
    public $error;

    public function __construct($message,$data,$error){
        $this->message = $message;
        $this->data = $data;
        $this->error = $error;
    }
    public function setMessage($message){
        $this->messgae = $message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getData($error){
        return $this->data;
    }
    public function setError($error){
        return $this->error = $error;
    }
    public function getError(){
        return $this->error;
    }
    
}