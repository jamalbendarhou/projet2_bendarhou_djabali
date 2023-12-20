<?php

require_once('../utils/Crud.php');

class OrderModel extends Crud
{
    public function getOrders()
    {
        return $this->getAll('user_order');
    }

    public function getOrderById($orderId)
    {
        return $this->getById('user_order', $orderId);
    }

    public function createOrder($userId, $total)
    {
        $query = "INSERT INTO user_order (user_id, total) VALUES (:user_id, :total)";
        $params = array(':user_id' => $userId, ':total' => $total);

        return $this->executeQuery($query, $params);
    }

    public function addToOrder($orderId, $productId, $quantity, $price)
    {
        $query = "INSERT INTO order_has_product (user_order_id, product_id, qtty, price) VALUES (:order_id, :product_id, :quantity, :price)";
        $params = array(':order_id' => $orderId, ':product_id' => $productId, ':quantity' => $quantity, ':price' => $price);

        return $this->executeQuery($query, $params);
    }

    public function getOrderDetails($orderId)
    {
        $query = "SELECT p.*, ohp.qtty, ohp.price as item_price FROM order_has_product ohp JOIN product p ON ohp.product_id = p.id WHERE ohp.user_order_id = :order_id";
        $params = array(':order_id' => $orderId);

        return $this->getAllWithParams($query, $params);
    }

}
?>
