<?php
// supprimerProduit.php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    require_once('../controllers/ProduitController.php');
    $produitController = new ProduitController();

    $productId = $_GET['id'];
    $produitController->supprimerProduit($productId);
    
    // Redirection ou affichage de message après suppression
    header("Location: manage_product.php");
    exit();
} else {
    // Gérer le cas où l'ID n'est pas fourni ou la méthode n'est pas GET
    echo "Erreur : Paramètres manquants.";
}
?>
