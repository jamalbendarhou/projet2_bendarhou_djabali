<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des produits</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="..." crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="...">
    <!-- Bootstrap JavaScript (si nécessaire) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
</head>

<body>

<div class="container_site">
    <?php
    require_once('../controllers/ProduitController.php');
    $produitController = new ProduitController();
    $produits = $produitController->afficherProduits();
    ?>

    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Gestion des produits</h2>
        </div>
        <div class="mb-3">
            <a href="ajoutProduit.php" class="btn btn-success">Ajouter un nouveau produit</a>
            <a href="admin_dashboard.php" class="btn btn-primary">Retour</a>
        </div>
        <br>

        <?php
        if (!empty($produits)) {
            ?>
            <table class="table">
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
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="supprimerProduit.php?id=<?php echo $produit['id']; ?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<p>Aucun produit trouvé.</p>";
        }
        ?>
    </div>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
