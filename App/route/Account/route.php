
<?php
require_once(dirname(__FILE__).'/AccountController.php');
require_once(dirname(__FILE__).'/../../account/domain/model/Credentials.php');
$accountController = new AccountController();
$username = $_POST['username'];
$password = $_POST['password'];
$action = $_POST['action'];

if($action == "login"){
    echo json_encode($accountController->login(new Credential($username,$password)));
}else if($action == "login/validate"){
    echo json_encode($accountController->validateLoginInfo(new SavedAccountInfo($username,$password)));
}else if($action == "register/validate"){
    echo json_encode($accountController->validateRegistrationInfo(new SavedAccountInfo("",""))); 
}else if($action == "register"){
    echo json_encode($accountController->createAccount(new SavedAccountInfo("","")));
}