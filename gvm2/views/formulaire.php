<!DOCTYPE html>
<head>
    <title>Formulaire</title>
    <link rel="stylesheet" href="../css/formulaire.css">
</head>
<body>

<?php

require_once '../config.php';
require_once '../controllers/MedicalController.php';

// Instanciation du modèle MedicalModel (avec $db étant votre connexion PDO)
$medicalModel = new MedicalDAO($db);

// Récupération des données depuis le modèle
$medecins = $medicalModel->getMedecins();
$specialites = $medicalModel->getSpecialites();
$medicaments = $medicalModel->getMedicaments();
?>

<div class="container">
    <p>Formulaire de Visite Médicale</p>
    <form action="traitement_formulaire.php" method="post">
        <!-- Liste déroulante des médecins -->
        <label for="medecin">Choisir un médecin :</label>
        <select id="medecin" name="medecin">
            <?php foreach ($medecins as $medecin) { ?>
                <option value="<?php echo $medecin['id']; ?>"><?php echo $medecin['nom']; ?></option>
            <?php } ?>
        </select>

        <!-- Liste déroulante des spécialités -->
        <label for="specialite">Spécialité du médecin :</label>
        <select id="specialite" name="specialite">
            <?php foreach ($specialites as $specialite) { ?>
                <option value="<?php echo $specialite['id']; ?>"><?php echo $specialite['nom']; ?></option>
            <?php } ?>
        </select>

        <!-- Champ pour la date -->
        <label for="date">Date :</label>
        <input type="date" id="date" name="date">

        <!-- Champ pour le motif de la visite -->
        <label for="motif">Motif de la visite :</label>
        <textarea id="motif" name="motif" rows="4"></textarea>

        <!-- Champ pour le bilan de la visite -->
        <label for="bilan">Bilan de la visite :</label>
        <textarea id="bilan" name="bilan" rows="4"></textarea>

        <!-- Sélection de médicaments -->
        <div class="form-group">
            <select id="medicament" name="medicament">
                <?php foreach ($medicaments as $medicament) { ?>
                    <option value="<?php echo $medicament['id']; ?>"><?php echo $medicament['nom']; ?></option>
                <?php } ?>
            </select>
            <!-- Champ pour la quantité -->
            <input type="number" id="quantite" name="quantite" placeholder="Quantité">
        </div>
        <!-- Bouton de soumission -->
        <button type="submit">Valider</button>
    </form>
</div>

</body>
</html>