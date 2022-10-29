<?php
class DrugTypeUiModel implements JsonSerializable{
    private $id;
    private $name;

    function __construct($id,$name){
        $this->id = $id;
        $this->name = $name;
    }

    public function jsonSerialize(){
        $arr = get_object_vars($this);
        return $arr;
    }

}