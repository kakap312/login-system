
<?php
$accountController = new AccountController();
$userlink ="https://loginsystem/login";

if($userlink == "login"){
    echo $accountController->login();
}else if($userlink == "login/validate"){
    echo json_encode($accountController->validateLoginInfo(new Credential("","")));
}else if($userlink == "register/validate"){
    echo json_encode($accountController->validateRegistrationInfo(new SavedAccountInfo("",""))); 
}else if($userlink == "register"){
    echo json_encode($accountController->createAccount(new SavedAccountInfo("","")));
}