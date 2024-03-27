<?php

require_once 'MedicalDAO.php';

class MedicalModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }



    public function createMedecin($nom, $specialite_id, $email, $password, $adresse) {
        // Hashage du mot de passe avant de le stocker
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // insérer le médecin dans la base de données
        $query = "INSERT INTO medecins (nom, id_specialite, adresse_email, mot_de_passe, adresse) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nom, $specialite_id, $email, $hashedPassword, $adresse]);

        // Retourne l'ID du nouveau médecin ajouté
        return $this->db->lastInsertId();
    }




    public function updateMedecin($medecin_id, $nom, $specialite_id, $email, $password, $adresse) {
        // Hashage du mot de passe avant de le stocker
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Mettre à jour le médecin dans la base de données
        $query = "UPDATE medecins SET nom = ?, id_specialite = ?, adresse_email = ?, mot_de_passe = ?, adresse = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nom, $specialite_id, $email, $hashedPassword, $adresse, $medecin_id]);

        // Retourne le nombre de lignes affectées (0 ou 1)
        return $stmt->rowCount();
    }




    public function deleteMedecin($medecin_id) {
        // Au lieu de supprimer réellement le médecin de la base de données, marquez-le comme "supprimé"
        $sql = "UPDATE medecins SET supprime = 1 WHERE id = :medecin_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':medecin_id', $medecin_id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
?>
