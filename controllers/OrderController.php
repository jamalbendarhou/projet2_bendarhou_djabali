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

    // Nouvelles méthodes pour gérer le panier
    public function afficherPanier()
    {
        // Logique pour récupérer les produits du panier et les afficher
        $paniers = $this->getPanier();
        // ... logique pour afficher le panier ...
    }

    public function ajouterAuPanier($productId, $quantity)
    {
        // Logique pour ajouter un produit au panier
        $panier = $this->getPanier();
        $panier[$productId] = $quantity;
        $this->setPanier($panier);
    }

    public function supprimerDuPanier($productId)
    {
        // Logique pour supprimer un produit du panier
        $panier = $this->getPanier();
        if (isset($panier[$productId])) {
            unset($panier[$productId]);
            $this->setPanier($panier);
        }
    }

    // Fonctions utilitaires pour gérer le panier en session
    private function getPanier()
    {
        return isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
    }

    private function setPanier($panier)
    {
        $_SESSION['panier'] = $panier;
    }
}
?>
