<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    require_once('../controllers/ProduitController.php');
    $produitController = new ProduitController();

    $productId = $_GET['id'];
    $produitController->supprimerProduit($productId);
    header("Location: manage_product.php");
    exit();
} else {
    echo "Erreur : Paramètres manquants.";
}
?>
