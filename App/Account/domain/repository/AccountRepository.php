<?php
interface AccountRepository{
    public function createAccount($savedAccountInfo);
    public function login($credential);
}
?>