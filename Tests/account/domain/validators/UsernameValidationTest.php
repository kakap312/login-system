<?php
require_once(dirname(__FILE__).'/../../../../account/domain/validators/UsernameValidation.php');

class UsernameValidatorTest extends PHPUnit_Framework_TestCase{
    private $usernameValidation;

    public function __construct(){
        $this->usernameValidation = new UsernameValidation();
    }
    public function testValidateShouldReturnFalseIfLenghtOfUsernameIsLessThan8(){
        $username = "kakap";
        $resutl = $this->usernameValidation->validate($username);
        $this->assertFalse($resutl);
    }
    public function testValidateShouldReturnFalseIfUsernameContiansSpace(){
        $username = "kak p312";
        $resutl = $this->usernameValidation->validate($username);
        $this->assertFalse($resutl);
    }
    public function testValidateShouldReturnFalseIfUsernameDoesNotContainsADigit(){
        $username = "kakapqw";
        $resutl = $this->usernameValidation->validate($username);
        $this->assertFalse($resutl);
    }

}