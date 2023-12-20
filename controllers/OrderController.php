<?php

require_once('../models/OrderModel.php');

class OrderController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function getOrders()
    {
        return $this->orderModel->getOrders();
    }

    public function getOrdersByUserId($userId)
    {
        return $this->orderModel->getOrdersByUserId($userId);
    }

    public function createOrder($userId, $total)
    {
        return $this->orderModel->createOrder($userId, $total);
    }

    public function addToOrder($orderId, $productId, $quantity, $price)
    {
        return $this->orderModel->addToOrder($orderId, $productId, $quantity, $price);
    }

    public function getOrderDetails($orderId)
    {
        return $this->orderModel->getOrderDetails($orderId);
    }

    
}
?>
