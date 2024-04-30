
<?php
class UserDAO {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Recherche de l'utilisateur par adresse email
    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }


   public function updateMdps($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role) {
    // Hashage du nouveau mot de passe avant de le stocker
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Mettre à jour l'utilisateur dans la base de données
    $query = "UPDATE users SET nom = ?, prenom = ?, email = ?, password = ?, adresse = ?, code_postal = ?, ville = ?, num_telephone = ?, role = ? WHERE email = ?";
    $stmt = $this->db->prepare($query);
    $stmt->execute([$nom, $prenom, $email, $hashedPassword, $adresse, $code_postal, $ville, $num_telephone, $role, $email]);
   }

}
?>


