<!-- update_formulaire.php -->
<?php
require_once '../config.php';
require_once '../controllers/MedicalController.php';

// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $medecin_id = $_POST['medecin_id'];
    $new_nom_medecin = $_POST['new_nom_medecin'];
    $new_nom_specialite = $_POST['new_nom_specialite'];
    $new_date = $_POST['new_date'];
    $new_motif = $_POST['new_motif'];
    $new_bilan = $_POST['new_bilan'];
    $new_nom_medicament = $_POST['new_nom_medicament'];
    $new_quantite = $_POST['new_quantite'];

    // Mettez à jour les données dans la base de données (à adapter selon votre logique d'accès aux données)
    $medicalModel = new MedicalModel($db);
    $medicalModel->updateMedecin($medecin_id, $new_nom_medecin, $new_nom_specialite, $new_date, $new_motif, $new_bilan, $new_nom_medicament, $new_quantite);

    // Redirection vers la page de récapitulatif
    header("Location: recap_formulaire.php?medecin_id=" . $medecin_id);
    exit();
} else {
    // Redirige vers une page d'erreur ou une autre page appropriée si la requête n'est pas POST
    header("Location: views/formulaire.php");
    exit();
}
?>
