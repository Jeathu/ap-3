<?php
require_once 'UserDAO.php';

class User {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role) {

        // Hashage du mot de passe avant de le stocker
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // insérer l'utilisateur dans la base de données
        $query = "INSERT INTO users (nom, prenom, email, password, adresse, code_postal, ville, num_telephone, role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $hashedPassword, $adresse, $code_postal, $ville, $num_telephone, $role]);
    }
}
?>







