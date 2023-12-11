<?php
require_once('UserController.php');
require_once('../models/UserModel.php'); // Ajoutez cette ligne pour inclure le modèle

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $userModel = new UserModel(); // Créez une instance du modèle

    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    $result = $userController->login($email, $password);

    if ($result === true) {
        // Authentification réussie

        // Récupérer le rôle de l'utilisateur en utilisant le modèle
        $user = $userModel->getUserByEmail($email);
        $role = $user['role_id'];

        // Redirection en fonction du rôle
        switch ($role) {
            case 1: // Superadmin
            case 2: // Admin
                header("Location:  ../views/admin_dashboard.php");
                break;
            case 3: // Client
                header("Location:  ../views/tousNosProduits.php");
                break;
            default:
                // Redirection par défaut (peut-être vers une page d'erreur)
                header("Location:  ../views/login.php");
        }

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
