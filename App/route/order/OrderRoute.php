<?php
require_once(dirname(__FILE__).'/OrderController.php');
require_once(dirname(__FILE__).'/../../order/domain/model/SavedOrderInfo.php');
require_once(dirname(__FILE__).'/../../order/domain/model/OrderedDrug.php');
$orderController = new OrderController();
$action = $_POST['action']; 

if($action == 'createorder'){
    $orderedDrugs = array();
    $listOfDrugs = json_decode($_POST['data'],true);
    for ($i=0; $i < count($listOfDrugs); $i++) { 
        array_push($orderedDrugs, new OrderedDrug(
            $listOfDrugs[$i]['id'],
            $listOfDrugs[$i]['quantity'],
            $listOfDrugs[$i]['quoteprice']
        ));
    }
    echo json_encode($orderController->createOrder(
        new SavedOrderInfo(
            '6323a46703f84',
            "in Progress",
            $_POST['createdat'],
            $orderedDrugs
        )
    ));
}