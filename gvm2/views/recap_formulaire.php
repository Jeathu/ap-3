<!-- recap_formulaire.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif Formulaire</title>
    <link rel="stylesheet" href="../css/recap_formulaire.css">
</head>
<body>
    <div class="container">
        <h2>Récapitulatif Formulaire</h2>

        <?php
        // Récupère l'identifiant du médecin depuis l'URL
        $medecin_id = isset($_GET['medecin_id']) ? $_GET['medecin_id'] : null;

        // Affiche le récapitulatif des données (à adapter selon votre logique d'accès aux données)
        // Vous pouvez récupérer les données de la base de données ici et les afficher
        echo "Récapitulatif des modifications pour le médecin avec l'ID $medecin_id.";
        ?>
    </div>
</body>
</html>
