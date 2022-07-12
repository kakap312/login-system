<?php
class UsernameValidation{
    
    public function validate($username){
        if(strlen(trim($username)) < 8){
            return false;
        }
        if(preg_match('/\s/',trim($username))){
            return false;
        }
        if(!preg_match('/\d/',trim($username))){
            return false;
        }
        return true;
    }
}