<?php
require_once(dirname(__FILE__).'/../../../core/data/db/model/DbConnection.php');
require_once(dirname(__FILE__).'/../db/dao/OrderDao.php');
require_once(dirname(__FILE__).'/../db/dao/OrderDetailDao.php');
require_once(dirname(__FILE__).'/../repository/OrderRepositoryImp.php');
require_once(dirname(__FILE__).'/../repository/OrderDetailRepositoryImp.php');
class OrderDi{
    private $dbConnection;
    private $orderDao;
    private $orderDetailDao;
    private $orderDetailRepositoryImp;
    private $orderRepositoryImp;

    public function __construct(){
        $this->dbConnection = (new DbConnection("localhost","root","","perfectdb"))->getDbConnection();
        $this->orderDao = new OrderDao($this->dbConnection);
        $this->orderDetailDao = new OrderDetailDao($this->dbConnection);
        $this->orderRepositoryImp = new OrderRepositoryImp($this->orderDao);
        $this->orderDetailRepositoryImp = new OrderDetailRepositoryImp($this->orderDetailDao);
    }
    public function getOrderDetailRepository(){return $this->orderDetailRepositoryImp;}
    public function getOrderRepository(){return $this->orderRepositoryImp;}
}