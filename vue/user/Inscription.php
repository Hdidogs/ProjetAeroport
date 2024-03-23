<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
</head>
<body>
<div class="inscription">
    <form method="post" action="../../src/controleur/TraitementUser.php">
        <input type="text" name="nom" placeholder="Nom" required>
        <br>
        <input type="text" name="prenom" placeholder="Prenom" required>
        <br>
        <input type="text" name="ville" placeholder="Ville" required>
        <br>
        <input type="date" name="date" placeholder="Date de Naissance" required>
        <br>
        <input type="email" name="mail" placeholder="Adresse Mail" required>
        <br>
        <input type="password" name="mdp" placeholder="Mot de Passe" required>
        <br>
        <input type="password" name="remdp" placeholder="Confirmer Mot de Passe" required>
        <br>
        <a href="Connexion.php">Vous avez déjà un compte ?</a>
        <br>
        <input type="submit" name="inscriptionclient" value="Inscription">
    </form>
</div>
</body>
</html>

