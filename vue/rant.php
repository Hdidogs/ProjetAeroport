<?php
session_start();
include '../src/bdd/SQLConnexion.php';

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    // Rediriger vers la page d'accueil ou une autre page sécurisée
    header("Location: ../index.php");
    exit;
}

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification de l'utilisateur
    if ($username === 'admin' && $password === 'password') {
        // Authentification réussie, générer un code de vérification
        $verification_code = rand(100000, 999999);

        // Enregistrer le code de vérification dans la session
        $_SESSION['verification_code'] = $verification_code;

        // Envoyer le code de vérification à l'utilisateur
        // Remplacez 'user@example.com' par l'adresse email de l'utilisateur
        mail('hdidiogs.pro@gmail.com', 'Votre code de vérification', 'Votre code de vérification est : ' . $verification_code);

        // Afficher le formulaire de vérification
        $show_verification_form = true;
    } else {
        // Informations d'identification incorrectes, afficher un message d'erreur
        $error = "Identifiants invalides";
    }
} elseif (isset($_POST['verification_code'])) {
    // Vérifier le code de vérification
    if ($_POST['verification_code'] == $_SESSION['verification_code']) {
        // Le code de vérification est correct, connecter l'utilisateur
        $_SESSION['user_id'] = 1;

        // Rediriger vers la page d'accueil ou une autre page sécurisée
        header("Location: home.php");
        exit;
    } else {
        // Le code de vérification est incorrect, afficher un message d'erreur
        $error = "Code de vérification incorrect";
    }
}
?>

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

    <?php if (isset($show_verification_form)) { ?>
        <form method="POST" action="">
            <label for="verification_code">Code de vérification:</label>
            <input type="text" id="verification_code" name="verification_code" required><br>

            <input type="submit" value="Vérifier">
        </form>
    <?php } else { ?>
        <form method="POST" action="">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Se connecter">
        </form>
    <?php } ?>
</body>
</html>