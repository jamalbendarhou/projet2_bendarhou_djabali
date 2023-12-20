<?php
require_once('../controllers/OrderController.php');
require_once('../controllers/UserController.php');

session_start();
$orderController = new OrderController();
$paniers = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="..." crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="...">
</head>
<body>

<div class="container_site">
    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Mon panier</h2>
        </div>
       
        <!-- Bouton de retour -->
        <div class="mb-3">
            <a href="tousNosProduits.php" class="btn btn-primary">Retour</a>
        </div>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paniers as $produit) { ?>
                    <tr>
                        <th scope="row"><?php echo $produit['id']; ?></th>
                        <td><?php echo $produit['name']; ?></td>
                        <td><input min="1" max="<?php echo $produit['qtty']; ?>" type="number" value="<?php echo $produit['qtty']; ?>" name="quantiterDemander"></td>
                        <td><?php echo $produit['price']; ?></td>
                        <td>
                            <button type="submit" class="btn btn-info" name="modifierProduit">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <a href="supprimerPanier.php?id=<?php echo $produit['id']; ?>" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <div id="paypal-payment-button"></div>
    </div>
</div>

<?php include '../public/footer.php'?>

<script src="https://www.paypal.com/sdk/js?client-id=AUIflDLG0Iage1Hg3jw4RNji3xNYf4nJ_UBKuGqxTsaOcfwHcX6ghB45G_FTYKGt3fBrN6feUfTgho_g"></script>
<script src="../public/paypal.js"></script>
</body>
</html>
