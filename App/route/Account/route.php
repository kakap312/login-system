
<?php
require_once(dirname(__FILE__).'/AccountController.php');
require_once(dirname(__FILE__).'/../../account/domain/model/Credentials.php');
$accountController = new AccountController();

$action =  $_POST['action'];

if($action == "login"){
    echo json_encode($accountController->login(new Credential($username,$password)));
}else if($action == "login/validate"){
    echo json_encode($accountController->login(new Credential($_POST['username'],$_POST['password'])));
}else if($action == "register/validate"){
    $fullName = $_POST['name'];
    echo json_encode($accountController->validateRegistrationInfo(new SavedAccountInfo($username,$password,$fullName))); 
}else if($action == "register"){
    echo json_encode($accountController->createAccount(new SavedAccountInfo("","")));
}else if($action == "username/validate"){
    echo json_encode($accountController->validateUsername($_POST['username']));
}else if($action == "password/validate"){
    echo json_encode($accountController->validatePassword($_POST['password']));
}else if($action == "password/validate"){

}