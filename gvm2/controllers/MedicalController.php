<?php

require_once '../models/MedicalModel.php';
require_once '../models/MedicalDAO.php';


class MedicalController {

 
    private $medicalModel;
    private $medicalDAO;

    public function __construct($db) {
        $this->medicalModel = new MedicalModel($db);
        $this->medicalDAO = new MedicalDAO($db);
    }



    public function showVisiteMedicale() {
        $this->medicalDAO->getMedecins();
        $this->medicalDAO->getSpecialites();
        $this->medicalDAO->getMedicaments();

        include 'views/formulaire.php';
    }



    public function mettreAJourMedecin($medecin_id, $nom, $specialite_id, $email, $password, $adresse) {
        // Effectuer une validation des données d'entrée si nécessaire

        // Appeler la méthode du modèle pour mettre à jour le médecin
        $nombreLignesModifiees = $this->medicalModel->updateMedecin($medecin_id, $nom, $specialite_id, $email, $password, $adresse);

        // Vérifier le nombre de lignes modifiées et prendre une action appropriée
        if ($nombreLignesModifiees > 0) {
            echo "Médecin mis à jour avec succès !";
        } else {
            echo "Échec de la mise à jour du médecin. Vérifiez vos saisies et réessayez.";
        }
    }




    public function supprimerMedecin($medecin_id) {
        // Effectuer une validation des données d'entrée si nécessaire

        // Appeler la méthode du modèle pour supprimer le médecin
        $nombreLignesSupprimees = $this->medicalModel-> deleteMedecin($medecin_id);

        // Vérifier le nombre de lignes supprimées et prendre une action appropriée
        if ($nombreLignesSupprimees > 0) {
            echo "Médecin supprimé avec succès !";
        } else {
            echo "Échec de la suppression du médecin. Vérifiez l'ID fourni et réessayez.";
        }
    }


}


?>
