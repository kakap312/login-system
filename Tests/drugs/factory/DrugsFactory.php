<?php
require_once(dirname(__FILE__).'/../../../app/core/domain/Result.php');
class DrugsFactory {

    public static function getSuccessResult(){
        return new Result(null,40);
    }
    public static function getFailureResult(){
        return new Result(null,50);
    }
   

}