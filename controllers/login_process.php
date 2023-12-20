<?php
require_once('UserController.php');
require_once('../models/UserModel.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $userModel = new UserModel(); 

    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    $result = $userController->login($email, $password);

    if ($result === true) {
        $user = $userModel->getUserByEmail($email);
        $role = $user['role_id'];

        switch ($role) {
            case 1: 
            case 2: 
                header("Location:  ../views/admin_dashboard.php");
                break;
            case 3: 
                header("Location:  ../views/tousNosProduits.php");
                break;
            default:
                
                header("Location:  ../views/login.php");
        }

        exit();
    } else {
        
        echo $result;
    }
} else {
    
    header("Location: login.php");
    exit();
}
?>
