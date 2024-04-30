<?php
// supprimer_formulaire.php

// Vérifiez si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez l'ID du médecin à supprimer
    $medecin_id_to_delete = $_POST['medecin_id_to_delete'];

    // Incluez le fichier de configuration et le modèle si nécessaire
    require_once '../config.php';
    require_once '../models/MedicalModel.php'; // Incluez le modèle directement ici

    // Instance de MedicalModel
    $medicalModel = new MedicalModel($db);

    // Effectuez la suppression du médecin (à adapter selon votre logique)
    $suppression_reussie = $medicalModel-> deleteMedecin($medecin_id_to_delete);

    if ($suppression_reussie) {
        // Redirigez l'utilisateur vers formulaire.php après la suppression réussie
        header("Location: formulaire.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        // Gestion de l'erreur, vous pouvez rediriger vers une page d'erreur si nécessaire
        echo "Erreur lors de la suppression du médecin.";
    }
}
?>
