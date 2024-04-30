<?php

class MedicalDAO {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    // Récupérer tous les médecins de la base de données
    public function getMedecins() {
        $query = "SELECT id, nom FROM medecins";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Récupérer le nom d'un Medecin en fonction de son ID
    public function getMedecinById($medecin_id) {
        $query = "SELECT nom FROM medecins WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$medecin_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
 

    // Récupérer toutes les spécialités médicales de la base de données
    public function getSpecialites() {
        $query = "SELECT id_specialite AS id, specialite AS nom FROM specialites";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //  Récupérer le nom de Specialite en fonction de son ID
    public function getSpecialiteById($specialite_id) {
        $query = "SELECT specialite AS nom FROM specialites WHERE id_specialite = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$specialite_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Récupérer toutes Medicaments de la base de données
    public function getMedicaments() {
        $query = "SELECT id, nom FROM medicaments";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Récupérer le nom d'un médicament en fonction de son ID
    public function getMedicamentById($medicament_id) {
        $query = "SELECT nom FROM medicaments WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$medicament_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

 
}

?>
