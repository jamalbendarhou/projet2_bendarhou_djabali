
<?php
require_once('UserController.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();

    
    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    
    $result = $userController->login($email, $password);

    if ($result === true) {
        // redirection si l auth est reussie
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
