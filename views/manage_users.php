<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
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
    // Import du contrôleur des utilisateurs
    require_once('../controllers/UserController.php');
    $userController = new UserController();

    // Récupération des utilisateurs
    $users = $userController->getUsers();
    ?>

    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Gestion des utilisateurs</h2>
        </div>
        <!-- Possibilité d'ajouter des boutons ou des liens pour des fonctionnalités supplémentaires ici -->
        <br>

        <?php
       
        if (!empty($users)) {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <!-- D'autres en-têtes de colonnes peuvent être ajoutées selon les besoins -->
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <th scope="row"><?php echo $user['id']; ?></th>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <!-- Ajouter des liens ou boutons pour des actions sur les utilisateurs si nécessaire -->
                        <td>
                            <!-- Exemple de bouton pour modifier un utilisateur -->
                            <a href="modifier_utilisateur.php?id=<?php echo $user['id']; ?>" class="btn btn-info">
                                Modifier
                            </a>
                            <!-- Autres actions comme la suppression ou la gestion des autorisations peuvent être ajoutées ici -->
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<p>Aucun utilisateur trouvé.</p>";
        }
        ?>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
