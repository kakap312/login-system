<?php
class DbOrderDetail{
    private $orderDetailId;
    private $drugId;
    private $orderId;
    private $quotePrice;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        $orderDetailId,
        $drugId,
        $orderId,
        $quotePrice,
        $createdAt,
        $updatedAt
    ) 
    {
        is_null($orderDetailId)?$this->dossageId= uniqid():$this->orderDetailId = $orderDetailId;
        $this->drugId = $drugId;
        $this->orderId = $orderId;
        $this->quotePrice =$quotePrice;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}