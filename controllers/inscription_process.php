<?php
require_once('../controllers/UserController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();

    // Récupération des données du formulaire
    $email = $_POST['email'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $billingAddressId = $_POST['billing_address_id'];
    $shippingAddressId = $_POST['shipping_address_id'];
    $roleId = 3; // Garder le rôle client par défaut si nécessaire

    // Hashage du mot de passe avant de l'insérer dans la base de données
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertion des données utilisateur dans la base de données
    $insertQuery = "INSERT INTO `user` (`email`, `token`, `username`, `fname`, `lname`, `pwd`, `billing_address_id`, `shipping_address_id`, `role_id`) 
                    VALUES (:email, 'random_token_generated_here', :username, :fname, :lname, :hashedPassword, :billingAddressId, :shippingAddressId, :roleId)";

    // Utilisation de la connexion depuis l'objet Crud
    $stmt = $crud->connexion->prepare($insertQuery);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':billingAddressId', $billingAddressId);
    $stmt->bindParam(':shippingAddressId', $shippingAddressId);
    $stmt->bindParam(':roleId', $roleId);

    // Exécution de la requête préparée
    if ($stmt->execute()) {
        echo "Inscription réussie !";
        // Redirection vers une page de succès ou autre
        header("Location: ../views/login.php"); // Modifiez ce chemin selon l'emplacement réel de votre fichier inscription_success.php
        exit();
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->errorInfo()[2];
    }
} else {
    header("Location: login.php");
    exit();
}
?>
