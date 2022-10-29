<?php
class Result implements JsonSerializable{
    private $data;
    private $message;
    private $success;

    public function __construct($data,$message,$success){
        $this->data = $data;
        $this->message = $message;
        $this->success = $success;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getData(){
        return $this->data;
    }
    public function setMessage($message){
        return $this->message = $message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function setSuccess($success){
        $this->success = $success;
    }
    public function getSuccess(){
        return $this->success;
    }
    public function jsonSerialize(){
        $arr = get_object_vars($this);
        return $arr;
    }
    
}