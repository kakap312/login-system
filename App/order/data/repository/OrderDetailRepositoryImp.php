<?php
require_once(dirname(__FILE__).'/../../domain/repository/OrderDetailRepository.php');
class OrderDetailRepositoryImp implements OrderDetailReposirtory{
    private $orderDetailDao;

    public function __construct($orderDetailDao){
        $this->orderDetailDao = $orderDetailDao;
    }
    public function createOrderDetail($dbOrderDetails){
        
    }
    public function deleteOrderDetail($id){}
    public function fetchOrderDetail(){}
}