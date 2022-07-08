<?php
require_once(dirname(__FILE__).'/../../../app/account/domain/model/savedAccountInfo.php');
require_once(dirname(__FILE__).'/../../../app/account/data/db/model/dbQueryResponse.php');
require_once(dirname(__FILE__).'/../../../app/core/data/domain/Result.php');
class AccountTestFactory{
    
    public static function makeSavedAccountInfo(){
        return new SavedAccountInfo("stephen","kakap3");
    }
    public static function makeDbQueryResponse(){
        return new DbQueryResponse(true,null,"account found");
    }
    public static function makeResult(){
        return new Result("account found",null);
    }
}