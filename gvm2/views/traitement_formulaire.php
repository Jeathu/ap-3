<!-- traitement_formulaire.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Récapitulatif de la visite médicale</title>
    <link rel="stylesheet" href="../css/traitement_formulaire.css">
</head>
<body>
    <div class="container">
        <h2>Récapitulatif de la visite médicale</h2>
        <hr>
        <br>
        <?php
        // Vérification des données envoyées
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once '../config.php';
            require_once '../controllers/MedicalController.php';

            // Récupération des données saisies dans le formulaire
            $medecin_id = $_POST['medecin'];
            $specialite_id = $_POST['specialite'];
            $date = $_POST['date'];
            $motif = $_POST['motif'];
            $bilan = $_POST['bilan'];
            $medicament_id = $_POST['medicament'];
            $quantite = $_POST['quantite'];

            // Instance de MedicalModel
            $medicalModel = new MedicalModel($db);
            $medicalDAO = new MedicalDAO($db);

            // Récupération du nom du médecin
            $medecin = $medicalDAO->getMedecinById($medecin_id);
            $nom_medecin = $medecin ? $medecin['nom'] : "Médecin non trouvé";

            // Récupération du nom de la spécialité
            $specialite = $medicalDAO->getSpecialiteById($specialite_id);
            $nom_specialite = $specialite ? $specialite['nom'] : "Spécialité non trouvée";

            // Récupération du nom du médicament
            $medicament = $medicalDAO->getMedicamentById($medicament_id);
            $nom_medicament = $medicament ? $medicament['nom'] : "Médicament non trouvé";

            // Affichage des données
            echo "<p>Médecin choisi : <span class='donee'>$nom_medecin</span></p>";
            echo "<p>Spécialité : <span class='donee'>$nom_specialite</span></p>";
            echo "<p>Date de visite : <span class='donee'>$date</span></p>";
            echo "<p>Motif de la visite : <span class='donee'>$motif</span></p>";
            echo "<p>Bilan de la visite : <span class='donee'>$bilan</span></p>";
            echo "<p>Médicament prescrit : <span class='donee'>$nom_medicament</span></p>";
            echo "<p>Quantité prescrite : <span class='donee'>$quantite</span></p>";
        } else {
            echo "<p>Aucune donnée reçue.</p>";
        }
        ?>

        <!-- Add forms for editing and deleting -->
        <form action="modifier_formulaire.php" method="post">
            <input type="hidden" name="medecin_id" value="<?php echo $medecin_id; ?>">
            <button id="edit" type="submit">Edit</button>
        </form>

        <form action="supprimer_formulaire.php" method="post">
            <input type="hidden" name="medecin_id_to_delete" value="<?php echo $medecin_id; ?>">
            <button id="delete" type="submit">Delete</button>
        </form>
    </div>


<style>
        button {
  padding: 8px 12px;
  margin-right: 10px;
  margin-bottom: 10px;
  cursor: pointer;
  border: none;
  border-radius: 4px;
  font-weight: bold;
  text-transform: uppercase;
}

/* Style pour le bouton Edit (vert) */
#edit {
  background-color: #4caf50; /* Vert */
  color: #fff;
}

/* Style pour le bouton Delete (rouge) */
#delete {
  background-color: #f44336; /* Rouge */
  color: #fff;
}
</style>
</body>
</html>
