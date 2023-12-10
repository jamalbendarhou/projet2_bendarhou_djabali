
<?php
require_once('UserController.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();

    // Récupère les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    // Appelle la fonction de connexion du contrôleur
    $result = $userController->login($email, $password);

    if ($result === true) {
        // Authentification réussie
        header("Location: ../views/tousNosProduits.php");
        exit();
    } else {
        // Affiche le message d'erreur
        echo $result;
    }
} else {
    // Redirection vers la page de connexion si le formulaire n'est pas soumis
    header("Location: login.php");
    exit();
}
?>
