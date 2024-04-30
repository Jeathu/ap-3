<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <h1>Inscription</h1>
    <form action="index.php?action=register" method="post">

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>
        <label for="email">Adresse mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse"><br><br>
        <label for="code_postal">Code postal:</label>
        <input type="text" id="code_postal" name="code_postal"><br><br>
        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville"><br><br>
        <label for="num_telephone">Numéro de téléphone:</label>
        <input type="text" id="num_telephone" name="num_telephone"><br><br>

        <!-- Champ de sélection du rôle -->
        <label for="role">Rôle:</label>
        <select id="role" name="role">
            <option value="medecin">Médecin</option>
            <option value="visiteur">Visiteur</option>
        </select><br><br>
        <input type="submit" value="S'inscrire">
    </form>
    <p>Déjà inscrit? <a href="index.php?action=login">Se connecter</a></p>
</body>
</html>

