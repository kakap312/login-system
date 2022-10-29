<?php
class OrderDetailDao {

    private $dbConnection;

    public function __construct($dbConnection){$this->dbConnection = $dbConnection;}
    public function insert($dbOrder){}
    public function delete($id){}
    public function update($id){}
    public function findAll(){}
}