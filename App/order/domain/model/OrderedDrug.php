<?php
class OrderedDrug{
    private $drugId;
    private $quantity;
    private $quotePrice;

    public function __construct($drugId,$quantity,$quotePrice){
        $this->drugId = $drugId;
        $this->quantity = $quantity;
        $this->quotePrice = $quotePrice;
    }
    public function getId(){return $this->drugId;}
    public function getQuantity(){return $this->quantity;}
    public function getquotePrice(){return $this->quotePrice;}
}