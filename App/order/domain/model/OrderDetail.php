<?php
class OrderDetail{
    private $orderDetailId;
    private $orderId;
    private $drugId;
    private $quotePrice;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    
    public function __construct(
        $orderDetailId,
        $orderId,
        $drugId,
        $quotePrice,
        $quantity,
        $createdAt,
        $updatedAt
    ){
        $orderDetailId == "" ? uniqid(): $this->orderDetailId = $orderDetailId;
        $this->orderId = $orderId;
        $this->drugId = $drugId;
        $this->quotePrice = $quotePrice;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}