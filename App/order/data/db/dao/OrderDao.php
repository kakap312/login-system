<?php
class OrderDao {

    private $dbConnection;

    public function __construct($dbConnection){$this->dbConnection = $dbConnection;}
    public function insert($dbOrder){
        $orderId = $dbOrder->getOrderId();
        $supplierId = $dbOrder->getSupplierId();
        $createdAt = $dbOrder->getCreatedAt();
        $updatedAt = $dbOrder->getCreatedAt();
        $orderStatus = $dbOrder->getOrderStatus();

        $queryStatement = "insert into orders values
        ('$orderId','$createdAt','$supplierId','$orderStatus','$updatedAt')";
        if($this->dbConnection->query($queryStatement)){return true;}else{return false;}
        $this->dbConnection->close();
    }
    public function delete($id){}
    public function update($id){}
    public function findAll(){}
}