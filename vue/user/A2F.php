<!DOCTYPE html>
<html>
<head>
    <title>Double Authentification</title>
</head>
<body>
<h1>Double Authentification</h1>

<?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
<?php } ?>
<form method="POST" action="../../src/controleur/TraitementA2F.php">
    <label for="text">Mot de passe:</label>
    <input type="text" minlength="6" maxlength="6" id="verification_code" name="verification_code" required><br>
    <input type="submit" value="Se connecter">
</form>
</body>
</html>