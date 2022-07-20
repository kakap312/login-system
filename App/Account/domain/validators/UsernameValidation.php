<?php
class UsernameValidation{
    
    public function validate($username){
        if(!(strlen(trim($username))  > 1 && strlen(trim($username)) <= 15 )){
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