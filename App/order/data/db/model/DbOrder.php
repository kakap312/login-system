<?php

class DbOrder{
    private $orderId;
    private $supplierId;
    private $createdAt;
    private $updatedAt;
    private $orderStatus;

    public function __construct($orderId,$supplierId,$createdAt,$updatedAt,$orderStatus){
        if($orderId == ""){$this->orderId= uniqid();}else{$this->orderId = $orderId;}
        $this->supplierId = $supplierId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->orderStatus = $orderStatus;
    }
    function getOrderStatus(){return $this->orderStatus;}
    public function getSupplierId(){return $this->supplierId;}
    public function getCreatedAt(){return $this->createdAt;}
    public function getOrderId(){return $this->orderId;}
}