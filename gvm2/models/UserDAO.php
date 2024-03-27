
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

}
?>


