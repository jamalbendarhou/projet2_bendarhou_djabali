<?php
require_once('../models/ProductModel.php');



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
