<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
</head>
<body>
    <div class="connexion">
        <form method="post" action="../../src/controleur/TraitementUser.php">
            <input type="email" name="mail" placeholder="Adresse Mail" required>
            <br>
            <input type="password" name="mdp" placeholder="Mot de Passe" required>
            <br>
            <a href="#">Mot de Passe Oublié</a>
            <br>
            <a href="Inscription.php">S'inscrire</a>
            <br>
            <input type="submit" name="connexion" value="Connexion">
        </form>
    </div>
</body>
</html>
