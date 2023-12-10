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
        // Remplace temporairement la vérification du mot de passe par une comparaison simple non hachée
        if ($mot_de_passe == $user['pwd']) {
            // Authentification réussie
            return true;
        } else {
            // Mot de passe incorrect
            var_dump("Mot de passe incorrect.", $mot_de_passe, $user['pwd']);
            return "Mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé
        return "Utilisateur non trouvé.";
    }
}

    

    private function verifyPassword($password, $hashedPassword, $hashAlgorithm)
    {
        // Utilise l'algorithme de hachage stocké dans la base de données
        switch ($hashAlgorithm) {
            case 'bcrypt':
                return password_verify($password, $hashedPassword);
                break;
            // Ajoutez des cas pour d'autres algorithmes si nécessaire
            default:
                return false;
        }
    }

    public function register($data)
    {
        if (!isset($data['role_id'])) {
            $data['role_id'] = 3; // 3 correspond à 'client'
        }

        // Hache le mot de passe
        $data['pwd'] = password_hash($data['pwd'], PASSWORD_BCRYPT);
        $data['pwd_algorithm'] = 'bcrypt';

        $result = $this->userModel->registerUser($data);

        if ($result) {
            echo "Inscription réussie !";
            header("Location: ../views/login.php");
            exit();
        } else {
            echo "Une erreur est survenue lors de l'inscription.";
        }
    }
}
?>
