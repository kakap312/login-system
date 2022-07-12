<?php
class PasswordValidation{
    
    public function validate($username){
        if(strlen(trim($username)) < 8){
            return false;
        }
        return true;
    }
}