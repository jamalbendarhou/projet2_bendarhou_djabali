<?php
require_once('../models/UserModel.php');

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    
    public function login($email, $mot_de_passe)
{
    $user = $this->userModel->getUserByEmail($email);

    if ($user) {
        // Vérifie si le mot de passe stocké commence par "*", et ajuste la comparaison si nécessaire
        $hashedPassword = $user['pwd'];
        if (substr($hashedPassword, 0, 1) === '*') {
            $hashedPassword = substr($hashedPassword, 1);
        }

        // Vérifie le mot de passe
        if (password_verify($mot_de_passe, $hashedPassword)) {
            // Vérifie également le token si nécessaire
            // Ajoutez cette vérification si le token est utilisé pour l'authentification
            $token = $user['token'];
            // Ajoutez votre logique de vérification du token ici

            // Vérifie si le mot de passe a besoin d'être rehashé
            if (password_needs_rehash($hashedPassword, PASSWORD_DEFAULT)) {
                // Mettez à jour le mot de passe haché dans la base de données avec le nouveau hachage
                $newHashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                // Mettez à jour le mot de passe dans la base de données ici
            }

            // L'utilisateur est authentifié
            header("Location: ../views/tousNosProduits.php");
            exit();
        } else {
            echo "Identifiants incorrects.";
        }
    } else {
        echo "Identifiants incorrects.";
    }
}



    public function register($data)
    {
        
        if (!isset($data['role_id'])) {
            $data['role_id'] = 3; // 3 correspond à 'client'
        }

        $result = $this->userModel->registerUser($data);

        if ($result) {
            echo "Inscription réussie !";
            
            header("Location: ../views/login.php");
            exit();
        } else {
            echo "Une erreur est survenue lors de l'inscription.";
        }
    }

    // Les autres fonctions du contrôleur restent inchangées
    // ...
}
?>
