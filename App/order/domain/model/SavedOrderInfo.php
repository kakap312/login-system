<?php
class SavedOrderInfo{
    private $supplierId;
    private $orderStatus;
    private $createdAt;
    private $ListOfOrderedDrugs;

    public function __construct($supplierId,$orderStatus,$createdAt,$ListOfOrderedDrugs){
        $this->supplierId = $supplierId;
        $this->orderStatus = $orderStatus;
        $this->createdAt = $createdAt;
        $this->ListOfOrderedDrugs = $ListOfOrderedDrugs;
    }
    function getOrderStatus(){return $this->orderStatus;}
    function getCreatedAt(){return $this->createdAt;}
    function getSupplierId(){return $this->supplierId;}
    function getListOfOrderedDrugs(){return $this->ListOfOrderedDrugs;}
}