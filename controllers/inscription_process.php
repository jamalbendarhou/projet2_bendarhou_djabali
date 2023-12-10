<?php
require_once('UserController.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();

    // Récupère les données du formulaire
    $data = array(
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'password' => $_POST['password'],
        'billing_address' => $_POST['billing_address'],
        'shipping_address' => $_POST['shipping_address'],
        'role' => $_POST['role']
    );

    // Appelle la fonction d'inscription du contrôleur
    $userController->register($data);
} else {
    // Redirection vers la page d'inscription si le formulaire n'est pas soumis
    header("Location: inscription.php");
    exit();
}
?>
