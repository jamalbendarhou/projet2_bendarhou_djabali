<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des produits</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>
<body>

<div class="container_site">
<?php
require_once('../controllers/ProduitController.php');
$produitController = new ProduitController();$produits = $produitController->afficherProduits(); 
?>

<div class="container">
    <div class="divider"></div>
    <div class="heading">
        <h2>Gestion des produits</h2>
    </div>
    <div class="mb-3">
        <a href="ajoutProduit.php" class="btn btn-success">Ajouter un nouveau produit</a>
    </div>
    <br>

    <?php
    if (!empty($produits)) {
        ?>
        <center><table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $produit) { ?>
                        <tr>
                            <th scope="row"><?php echo $produit['id']; ?></th>
                            <td><?php echo $produit['name']; ?></td>
                            <td><?php echo $produit['qtty']; ?></td>
                            <td><?php echo $produit['price']; ?></td>
                            <td>
                                <a href="modifierProduit.php?id=<?php echo $produit['id']; ?>" class="btn btn-info">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="supprimerProduit.php?id=<?php echo $produit['id']; ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table><center />
        <?php
        } else {
            echo "<p>Aucun produit trouvé.</p>";
        }
        ?>
    </div>
    <?php include '../public/footer.php'; ?> 
</div>

</body>
</html>
