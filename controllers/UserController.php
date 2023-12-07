<?php
require_once('models/UserModel.php');

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login($email, $mot_de_passe)
    {
        // Validation et traitement de la connexion ici
        // ...

        // Exemple de vérification d'authentification
        $user = $this->userModel->getUserByEmail($email);
        if ($user && password_verify($mot_de_passe, $user['pwd'])) {
            // L'utilisateur est authentifié, vous pouvez définir des sessions, etc.
            // ...
            echo "Connexion réussie !";
        } else {
            echo "Identifiants incorrects.";
        }
    }
}
