<?php
interface OrderRepository{
    public function createOrder($dbOrder);
    public function deleteOrderById($id);
    public function updateOrder($id);
}