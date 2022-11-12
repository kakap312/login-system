<?php
require_once(dirname(__FILE__).'/DrugsController.php');
require_once(dirname(__FILE__).'/../../drugs/domain/model/SavedDrugInfo.php');
require_once(dirname(__FILE__).'/../../drugs/domain/model/SavedDrugDossageInfo.php');

$drugsController = new DrugsController();
$action = $_POST['action'];



if($action == "createdrug"){
    echo json_encode($createDrugResult = $drugsController->createDrugs(new SavedDrugInfo(
        ucwords($_POST['drugname']),
        ucwords($_POST['druglocation']),
        ucwords($_POST['drugamount']),
        ucwords($_POST['expirydate']),
        $_POST['drugweight'],
        ucwords($_POST['druggroup']),
        ucwords($_POST['drugtype']), 
        ucwords($_POST['drugmanufacturer']),
        isset($_POST['effect'])? ucwords($_POST['effect'])  : "",
        isset($_POST['adultdossage'])? ucwords($_POST['adultdossage'])  : "",
        isset($_POST['childdossage'])? ucwords($_POST['childdossage']) : "",
        $_POST['createdat'],
        $_POST['createdat']
    )));
}else if ($action == "updatedrug") {
    echo json_encode($createDrugResult = $drugsController->updateDrug($_POST['drugId'],new SavedDrugInfo(
        ucwords($_POST['drugname']),
        ucwords($_POST['druglocation']),
        ucwords($_POST['drugamount']),
        ucwords($_POST['expirydate']),
        $_POST['drugweight'],
        ucwords($_POST['druggroup']),
        ucwords($_POST['drugtype']), 
        ucwords($_POST['drugmanufacturer']),
        isset($_POST['effect'])? ucwords($_POST['effect'])  : "",
        isset($_POST['adultdossage'])? ucwords($_POST['adultdossage'])  : "",
        isset($_POST['childdossage'])? ucwords($_POST['childdossage']) : "",
        $_POST['createdat'],
        $_POST['createdat']
    )));
}else if($action=="druggroup"){
     echo json_encode($drugsController->retriveDrugGroups());
}else if($action == "drugtype"){
    echo json_encode($drugsController->retrieveDrugType());

}else if($action=="drugcategory"){

}else if($action=="druglocation"){
    echo json_encode($drugsController->retrieveDrugLocation());
}else if ($action == "fetchdrugs"){
    echo json_encode($drugsController->viewDrugs());
}else if ($action == 'searchdrugs'){
    echo json_encode($drugsController->searchdrugs($_POST['searchkey']));
}else if($action == 'totaldrugs'){
    echo json_encode($drugsController->getTotalDrugs());
}else if($action == 'deletedrug') {
    echo json_encode($drugsController->deleteDrug($_POST['drugid']));
}else if($action == 'searchdrug'){
    echo json_encode($drugsController->viewDrug($_POST['drug_id']));
}

    
