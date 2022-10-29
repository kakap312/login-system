<?php
interface OrderDetailReposirtory{
    public function createOrderDetail($dbOrderDetails);
    public function deleteOrderDetail($id);
    public function fetchOrderDetail();
}