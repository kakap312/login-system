<?php
class DependencyInjection{

    public static function getRepository(){
        return new Repository();
    }
    public static function getAccountDao(){
        return new Dao();
    }
    public static function getConnection(){
        return new DBConnection();
    }
}