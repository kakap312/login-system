<?php
interface AccountRepository{
    public function createAccount($savedAccountInfo);
    public function isAccountFound($username,$password);
}
?>