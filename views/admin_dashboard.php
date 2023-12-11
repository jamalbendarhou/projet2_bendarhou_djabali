<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord de l'Administrateur - MOTO VIBE</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>

<body>
    <div class="container_site">
        <?php include '../public/header.php' ?>
        <br><br>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Tableau de Bord de l'Administrateur</h2>
            </div>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    
                    <a href="manage_products.php" class="btn">Gestion des Produits</a>
                    <a href="manage_users.php" class="btn">Gestion des Utilisateurs</a>
                    <a href="manage_orders.php" class="btn">Visualiser les Commandes</a>
                    
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <?php include '../public/footer.php' ?>
</body>

</html>
