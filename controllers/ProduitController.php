<?php
require_once('../models/ProduitModel.php');

class ProduitController
{
    protected $produitModel;

    public function __construct()
    {
        $this->produitModel = new ProduitModel();
    }

    public function afficherProduits()
    {
        $produits = $this->produitModel->getProduits();
        return $produits; 
    }

    public function ajouterProduit($data)
    {
        $productId = $this->produitModel->ajouterProduit($data);

        if ($productId) {
            echo "Produit ajouté avec l'ID : $productId";
        } else {
            echo "Erreur lors de l'ajout du produit.";
        }
    }

    public function modifierProduit($productId, $newData)
    {
        $result = $this->produitModel->modifierProduit($productId, $newData);

        if ($result) {
            echo "Produit mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du produit.";
        }
    }

    public function supprimerProduit($productId)
    {
        $result = $this->produitModel->supprimerProduit($productId);

        echo $result;
    }
}

?>
