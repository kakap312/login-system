<?php
require_once(dirname(__FILE__).'/../../../../account/domain/validators/PasswordValidation.php');

class PasswordValidationTest extends PHPUnit_Framework_TestCase{
    private $passwordValidation;

    public function __construct(){
        $this->passwordValidation = new PasswordValidation();
    }
    public function testValidateShouldReturnFalseIfLenghtOfPasswordIsLessThan8(){
        $password = "kakap";
        $result = $this->passwordValidation->validate($password);
        $this->assertFalse($result);
    }
   
}