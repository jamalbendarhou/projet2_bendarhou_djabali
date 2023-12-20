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
                
                return true;
            } else {
                
                var_dump("Mot de passe incorrect.", $mot_de_passe, $user['pwd']);
                return "Mot de passe incorrect.";
            }
        } else {
            
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
            $data['role_id'] = 3; 
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
    public function getUsers() {
        return $this->userModel->getAllUsers(); 
    }
    public function getUserById($id)
{
    
    return $this->userModel->getUserById($id);
}
public function updateUser($data)
{
    
    if (!isset($data['id'])) {
        echo "ID de l'utilisateur non spécifié pour la mise à jour.";
        exit();
    }

    
    $updated = $this->userModel->updateUserDetails($data);

    if ($updated) {
        
        header("Location: ../views/manage_users.php");
        exit();
    } else {
        echo "Échec de la mise à jour des détails de l'utilisateur.";
        
    }
}

    
}
?>
