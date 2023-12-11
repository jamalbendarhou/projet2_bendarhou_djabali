<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des commandes</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="..." crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="...">
    <!-- Bootstrap JavaScript (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
</head>

<body>

<div class="container_site">
    <?php
    // Import du contrôleur des commandes
    require_once('../controllers/OrderController.php');
    $orderController = new OrderController();

    // Récupération des commandes
    $orders = $orderController->getOrders();
    ?>

    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Gestion des commandes</h2>
        </div>
        <!-- Possibilité d'ajouter des boutons ou des liens pour des fonctionnalités supplémentaires ici -->
        <br>

        <?php
        if (!empty($orders)) {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Référence</th>
                    <th>Date de commande</th>
                    <th>Total</th>
                    <!-- D'autres en-têtes de colonnes peuvent être ajoutées selon les besoins -->
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <th scope="row"><?php echo $order['id']; ?></th>
                        <td><?php echo $order['ref']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo $order['total']; ?></td>
                        <!-- Ajouter des liens ou boutons pour des actions sur les commandes si nécessaire -->
                        <td>
                            <!-- Exemple de bouton pour voir les détails d'une commande -->
                            <a href="voir_details_commande.php?id=<?php echo $order['id']; ?>" class="btn btn-primary">
                                Voir détails
                            </a>
                            <!-- Autres actions comme la modification ou la suppression peuvent être ajoutées ici -->
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<p>Aucune commande trouvée.</p>";
        }
        ?>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
