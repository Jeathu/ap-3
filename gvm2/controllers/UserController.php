
<?php
require_once 'models/UserModel.php';

class UserController {
    private $userModel;
    private $userDAO; 

    public function __construct($db) {
        $this->userModel = new User($db);
        $this->userDAO = new UserDAO($db);
    }


    public function register($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role) {
        // Créer un nouvel utilisateur
        $this->userModel->createUser($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role);
    }


    public function login($email, $password) {
        // Récupérer l'utilisateur par email
        $user = $this->userDAO->getUserByEmail($email);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Authentification réussie
            return $user;
        } else {
            // Échec de l'authentification
            return false;
        }
    }
}
?>

