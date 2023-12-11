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
        $query = "SELECT * FROM product WHERE id = :id";
        $params = array(':id' => $productId);
        return $this->getSingleResult($query, $params);
    }

    public function ajouterProduit($data)
    {
        $query = "INSERT INTO product (name, qtty, price) VALUES (:name, :qtty, :price)";
        $params = array(
            ':name' => $data['name'],
            ':qtty' => $data['qtty'],
            ':price' => $data['price']
        );

        return $this->executeQuery($query, $params);
    }

    public function modifierProduit($productId, $newData)
    {
        $query = "UPDATE product SET name = :name, qtty = :qtty, price = :price WHERE id = :id";
        $params = array(
            ':id' => $productId,
            ':name' => $newData['name'],
            ':qtty' => $newData['qtty'],
            ':price' => $newData['price']
        );

        return $this->executeQuery($query, $params);
    }

    public function supprimerProduit($productId)
    {
        $query = "DELETE FROM product WHERE id = :id";
        $params = array(':id' => $productId);

        return $this->executeQuery($query, $params);
    }
}
?>
