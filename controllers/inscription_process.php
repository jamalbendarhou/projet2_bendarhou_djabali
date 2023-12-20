<?php
require_once('UserController.php');
$crud = new Crud();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $roleId = $_POST['role']; 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $billingAddressId = 1; 
    $shippingAddressId = 1; 

    $insertQuery = "INSERT INTO `user` (`email`, `token`, `username`, `fname`, `lname`, `pwd`, `billing_address_id`, `shipping_address_id`, `role_id`) 
                    VALUES (:email, 'random_token_generated_here', :username, :fname, :lname, :hashedPassword, :billingAddressId, :shippingAddressId, :roleId)";

   
    $stmt = $crud->connexion->prepare($insertQuery);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':billingAddressId', $billingAddressId);
    $stmt->bindParam(':shippingAddressId', $shippingAddressId);
    $stmt->bindParam(':roleId', $roleId);

   
    if ($stmt->execute()) {
        echo "Inscription réussie !";
        
        header("Location: ../views/login.php"); 
        exit();
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->errorInfo()[2];
    }
} else {
    header("Location: login.php");
    exit();
}
?>
