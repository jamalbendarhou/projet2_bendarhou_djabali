<?php

require_once('../utils/Crud.php');

class ProduitModel extends Crud
{
    public function getProduits()
    {
        return $this->getAll('product');
    }

    public function getProduitById($productId)
    {
        return $this->getById('product', $productId);
    }

    public function ajouterProduit($data)
    {
        $request = "INSERT INTO product (name, qtty, price, url_img, description) 
                    VALUES (:name, :qtty, :price, :url_img, :description)";

        return $this->add($request, $data);
    }

    public function modifierProduit($productId, $newData)
    {
        $request = "UPDATE product 
                    SET name = :name, qtty = :qtty, price = :price, url_img = :url_img, description = :description 
                    WHERE id = :id";

        $newData['id'] = $productId;

        return $this->update($request, $newData);
    }

    public function supprimerProduit($productId)
    {
        return $this->delete('product', $productId);
    }
}
?>
