<?php
require_once('../models/ProductModel.php');

//controleur pour la pages de tous nos produit pour l affichage de tt les items 

class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function afficherTousLesProduits()
    {
        $products = $this->productModel->getAll('product');

        include ('views/tousNosProduits.php');
    }

    public function getAllProducts()
    {
        return $this->productModel->getAll('product');
    }
}
