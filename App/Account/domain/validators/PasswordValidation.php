<?php
class PasswordValidation{
    
    public function validate($password){
        if(strlen(trim($password)) < 8){
            return false;
        }
        return true;
    }
}