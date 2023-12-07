<?php
require_once('../utils/Crud.php');

class ProductModel extends Crud
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        $array = $this->getAll('product');
    }
}

