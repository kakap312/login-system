
<?php
session_start();
require_once(dirname(__FILE__).'/AccountController.php');
require_once(dirname(__FILE__).'/../../account/domain/model/Credentials.php');

$accountController = new AccountController();
$action =  $_POST['action'];

if($action == "login"){
    echo json_encode($accountController->login(new Credential($_POST['username'],$_POST['password'])));
    $_SESSION['username'] = $_POST['username']; 
}else if($action == "register"){
    echo json_encode($accountController->createAccount(new SavedAccountInfo($_POST['name'],$_POST['username'],$_POST['password'])));
}else if($action == "username/validate"){
    echo json_encode($accountController->validateUsername($_POST['username']));
}else if($action == "password/validate"){
    echo json_encode($accountController->validatePassword($_POST['password']));
}else if($action == "name/validate"){
    echo json_encode($accountController->validateName($_POST['fullname']));
}