<?php
require_once('../models/ProduitModel.php');
// controlleur pour la page de gestion des produits 
//l ajout la modification la supression ...
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
            
            header("Location: manage_products.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout du produit.";
        }
    }

    public function modifierProduit($productId, $newData)
    {
        $result = $this->produitModel->modifierProduit($productId, $newData);

        if ($result) {
            
            header("Location: manage_products.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour du produit.";
        }
    }

    public function supprimerProduit($productId)
    {
        $result = $this->produitModel->supprimerProduit($productId);

        if ($result) {
            
            header("Location: manage_products.php");
            exit();
        } else {
            echo "Erreur lors de la suppression du produit.";
        }
    }

    
    public function getProduitById($productId)
    {
        $produit = $this->produitModel->getProduitById($productId);
        return $produit;
    }
    }

?>
