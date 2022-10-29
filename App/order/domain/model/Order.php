<?php
class Order{
    private $orderId;
    private $createdAt;
    private $updatedAt;

    public function __construct($orderId,$createdAt,$updatedAt){
       $this->orderId = $orderId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}