
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <h1>Connexion</h1>
    <form action="index.php?action=login" method="post">
        <label for="email">Adresse mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>
    <p>Pas encore inscrit? <a href="index.php?action=register">S'inscrire</a></p>
    <!-- insert le fichier de modification mot de passe -->
    <p>Changer votre mot de passe :<a href="index.php?action=updateMdp"> changer mot de passe</a></p>

</body>
</html>



