<?php
require_once(dirname(__FILE__).'/../../order/data/di/OrderDi.php');
require_once(dirname(__FILE__).'/../../order/data/db/model/DbOrder.php');
require_once(dirname(__FILE__).'/../../order/domain/model/OrderDetail.php');
require_once(dirname(__FILE__).'/../../core/domain/Result.php');


class OrderController {

    private $orderRepository;
    private $orderDetailRepository;

    public function __construct(){
        $orderDi = new OrderDi();
        $this->orderRepository = $orderDi->getOrderRepository() ;
        $this->orderDetailRepository = $orderDi->getOrderDetailRepository();
    }
    public function createOrder($savedOrderInfo){
        $dbOrder = new DbOrder(
            "",
            $savedOrderInfo->getSupplierId(),
            $savedOrderInfo->getCreatedAt(),
            $savedOrderInfo->getCreatedAt(),
            $savedOrderInfo->getOrderStatus()
        );
        $orderCreationReuslt =  $this->orderRepository->createOrder($dbOrder);
        if($orderCreationReuslt->getSuccess() && $this->createOrderDetail($dbOrder->getOrderId(),$savedOrderInfo->getListOfOrderedDrugs())->getSuccess()){
            return $orderCreationReuslt;
        }else{
            return new Result(null,SIXTY,false);
        }
        // if orderCreationResult is true we then insert ordered drugs into the order detail table
    }
    public function updateOrder(){}
    public function createOrderDetail($orderId,$savedOrderInfo){
        $dbOrderDetails = array();
        foreach ( $savedOrderInfo->getListOfOrderedDrugs() as $drug) {
            $dbOrderDetail = new DbOrderDetial(
                "",
                $orderId,
                $drug->getId(),
                $drug->getQuotePrice(),
                $drug->getQuantity(),
                $drug->getId(),
                $savedOrderInfo->getCreatedAt(),
                $savedOrderInfo->getCreatedAt()
            ); 
            array_push($dbOrderDetails,$dbOrderDetail);
        }
        $this->orderDetailRepository->createOrderDetail($dbOrderDetails);
        
        
    }
    public function updateOrderDetail(){}
    public function viewOrders(){}
}