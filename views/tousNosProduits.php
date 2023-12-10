<?php

include '../controllers/ProductController.php';

// Inclure le header
include '../public/header.php';
echo "<br><br><br>";

$controller = new ProductController();

$products = $controller->getAllProducts();

// Afficher les produits
if (is_array($products)) {
    foreach ($products as $product) {
        ?>
        <div class="produit">
            <img src="../images/<?php echo $product['url_img']; ?>" alt="Image du produit">
            <h3><?php echo $product['description']; ?></h3>
            <p>Prix : $<?php echo $product['price']; ?></p>
            <a href="produit_detail.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Voir</a>
            <a href="#" class="btn btn-primary">Payer</a>
        </div>
        <?php
    }
} else {
    echo "Aucun produit trouvé.";
}?><br><br><br><br>
<?php
// Inclure le footer
include '../public/footer.php';
?>
