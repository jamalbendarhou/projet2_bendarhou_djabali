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
            
            if (password_verify($mot_de_passe, $user['pwd'])) {
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
       
        switch ($hashAlgorithm) {
            case 'bcrypt':
                return password_verify($password, $hashedPassword);
                break;
            
            default:
                return false;
        }
    }

    public function register($data)
    {
        if (!isset($data['role_id'])) {
            $data['role_id'] = 3; // 3 correspond à 'client'
        }

        
        $data['pwd'] = password_hash($data['password'], PASSWORD_BCRYPT);
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
