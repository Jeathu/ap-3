
<?php
require_once 'models/UserModel.php';

class UserController {
    private $userModel;
    private $userDAO; 

  public function __construct($db) {
        $this->userModel = new User($db);
        $this->userDAO = new UserDAO($db);
  }

  /*
    public function register($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role) {
        // Créer un nouvel utilisateur
        $this->userModel->createUser($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role);
    }
  */


  public function register($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role) {
    // Vérifier si le mot de passe respecte les conditions
    if ($this->verifierMotDePasse($password)) {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('/[^\w\d\s]/', $password);

        if ($uppercase && $lowercase && $number && $specialChars && strlen($password) >= 12) {
            // Créer un nouvel utilisateur
            $this->userModel->createUser($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role);
            return true; // Succès de l'enregistrement
        } else {
            return false; // Échec de l'enregistrement en raison d'un mot de passe invalide
        }
    } else {
        return false; // Échec de l'enregistrement en raison d'un mot de passe invalide
    }
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
 
  // Création de fonction vérification de mot de passe avec regex (modification effectuée)
  public function verifierMotDePasse($password) {
      // Définir l'expression régulière pour vérifier les conditions du mot de passe
      $regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\d\s])(?=.*[^\s]).{12,}$/';

      // Vérifier si le mot de passe correspond à l'expression régulière
      if (preg_match($regex, $password)) {
        return true; // Le mot de passe respecte les conditions
      } else {
        return false; // Le mot de passe ne respecte pas les conditions
      }
  }

}


?>

