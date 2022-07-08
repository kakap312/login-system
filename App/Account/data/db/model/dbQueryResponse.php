<?php
class DbQueryResponse{
    private $error;
    private $data;
    private $message;

    public function __construct($error,$data,$message){
        $this->error = $error;
        $this->data = $data;
        $this->message = $message;
    }
    public function setError($error){
        $this->error = $error;
    }
    public function getError(){
       return  $this->error;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getData(){
       return  $this->data;
    }
    public function setMessage($message){
        $this->message = $message;
    }
    public function getMessage(){
       return  $this->message;
    }
}