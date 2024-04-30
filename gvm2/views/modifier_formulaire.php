<!-- modifier_formulaire.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Formulaire</title>
    <link rel="stylesheet" href="../css/modifier_formulaire.css">
</head>
<body>
    <div class="container">
        <h2>Modifier Formulaire</h2>

        <?php
        // Vérifie si le formulaire est soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            require_once '../config.php';
            require_once '../controllers/MedicalController.php';


            // Récupère les données pour l'enregistrement sélectionné
            $medecin_id = $_POST['medecin_id'];
            $medicalDAO = new MedicalDAO($db);
            $medecinData = $medicalDAO->getMedecinById($medecin_id);


            // Affiche le formulaire avec les données pré-remplies
            ?>
            <form action="update_formulaire.php" method="post">
                <!-- Inclure un champ caché pour identifier l'enregistrement en cours de modification -->
                <input type="hidden" name="medecin_id" value="<?php echo $medecin_id; ?>">

                <!-- Ajoutez des champs de saisie pour l'édition -->
                <label for="new_nom_medecin">Nouveau nom du médecin :</label>
                <input type="text" id="new_nom_medecin" name="new_nom_medecin" value="<?php echo isset($medecinData['nom']) ? $medecinData['nom'] : ''; ?>" required>

                <label for="new_nom_specialite">Nouveau nom de la spécialité :</label>
                <input type="text" id="new_nom_specialite" name="new_nom_specialite" value="<?php echo isset($medecinData['nom_specialite']) ? $medecinData['nom_specialite'] : ''; ?>" required>

                <label for="new_date">Nouvelle date de visite :</label>
                <input type="date" id="new_date" name="new_date" value="<?php echo isset($medecinData['date']) ? $medecinData['date'] : ''; ?>" required>

                <label for="new_motif">Nouveau motif de la visite :</label>
                <textarea id="new_motif" name="new_motif" required><?php echo isset($medecinData['motif']) ? $medecinData['motif'] : ''; ?></textarea>

                <label for="new_bilan">Nouveau bilan de la visite :</label>
                <textarea id="new_bilan" name="new_bilan"><?php echo isset($medecinData['bilan']) ? $medecinData['bilan'] : ''; ?></textarea>

                <label for="new_nom_medicament">Nouveau nom du médicament prescrit :</label>
                <input type="text" id="new_nom_medicament" name="new_nom_medicament" value="<?php echo isset($medecinData['nom_medicament']) ? $medecinData['nom_medicament'] : ''; ?>" required>

                <label for="new_quantite">Nouvelle quantité prescrite :</label>
                <input type="number" id="new_quantite" name="new_quantite" value="<?php echo isset($medecinData['quantite']) ? $medecinData['quantite'] : ''; ?>" required>

                <button type="submit">Enregistrer les modifications</button>
            </form>
            <?php
        } else {
            // Redirige vers formulaire.php si l'accès se fait directement sans une requête POST
            header("Location: views/formulaire.php");
            exit();
        }
        ?>
    </div>
</body>
</html>