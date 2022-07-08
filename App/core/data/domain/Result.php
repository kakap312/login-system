<?php
class Result{
    private $message;
    private $data;

    public function __construct($message,$data){
        $this->message = $message;
        $this->data = $data;
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
    public function getData(){
        return $this->data;
    }
    
}