<?php
require_once('../controllers/UserController.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();

    // Récupère les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    // Appelle la fonction de connexion du contrôleur
    $userController->login($email, $password);
} else {
    // Redirection vers la page de connexion si le formulaire n'est pas soumis
    header("Location: login.php");
    exit();
}
?>
