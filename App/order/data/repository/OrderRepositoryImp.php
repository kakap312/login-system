<?php
require_once(dirname(__FILE__).'/../../domain/repository/OrderRepository.php');
require_once(dirname(__FILE__).'/../../../core/domain/Result.php');
require_once(dirname(__FILE__).'/../../../core/domain/Constant.php');

class OrderRepositoryImp implements OrderRepository{ 
    private $orderDao;

    public function __construct($orderDao){
        $this->orderDao = $orderDao;
    }

    public function createOrder($dbOrder){
        return  $this->orderDao->insert($dbOrder)? new Result(null,TEN,true):new Result(null,SIXTY,false);
    }
    public function deleteOrderById($id){}
    public function updateOrder($id){}

}