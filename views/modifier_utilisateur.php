<?php
// Import du contrôleur des utilisateurs
require_once('../controllers/UserController.php');

// Vérification si l'ID de l'utilisateur à modifier est présent dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupération de l'ID de l'utilisateur à modifier depuis l'URL
    $user_id = $_GET['id'];

    // Création d'une instance de UserController
    $userController = new UserController();

    // Récupération des détails de l'utilisateur à partir de son ID
    $user = $userController->getUserById($user_id);

    // Vérification si l'utilisateur existe
    if(!$user) {
        echo "Utilisateur non trouvé.";
        exit;
    }
} else {
    echo "ID de l'utilisateur non spécifié.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez les données soumises et mettez à jour les détails de l'utilisateur
    $userDetails = array(
        'id' => $user_id, // Récupérez l'ID de l'utilisateur depuis l'URL
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'password' => $_POST['password'], // Vous pouvez appliquer les validations nécessaires au mot de passe
        'role_id' => $_POST['role']
        // Ajoutez d'autres champs de formulaire pour d'autres détails de l'utilisateur si nécessaire
    );

    // Création d'une instance de UserController
    $userController = new UserController();

    // Appel de la méthode updateUser pour mettre à jour les détails de l'utilisateur
    $userController->updateUser($userDetails);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier utilisateurs - MOTO VIBE</title>
    <link rel="stylesheet" type="text/css" href="../public/styles.css">
</head>
<body>
    <div class="container_site">
        <?php include '../public/header.php' ?>
        <br><br>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Modifier l'utilisateur</h2>
            </div>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="fname">Prénom :</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="lname">Nom :</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Rôle :</label>
                            <select class="form-control" id="role" name="role">
                                <option value="1" <?php if ($user['role_id'] == 1) echo 'selected'; ?>>Super Admin</option>
                                <option value="2" <?php if ($user['role_id'] == 2) echo 'selected'; ?>>Admin</option>
                                <option value="3" <?php if ($user['role_id'] == 3) echo 'selected'; ?>>Client</option>
                                <!-- Ajoutez d'autres options pour d'autres rôles si nécessaire -->
                            </select>
                        </div>

                        <!-- Ajoutez d'autres champs de formulaire pour d'autres détails de l'utilisateur si nécessaire -->

                        <button type="submit" class="btn">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
    <?php include '../public/footer.php' ?>
</body>
</html>


