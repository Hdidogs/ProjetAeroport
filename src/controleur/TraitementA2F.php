<?php
session_start();
include '../../src/bdd/SQLConnexion.php';
include '../../src/model/Mail.php';

if (isset($_POST['verification_code'])) {
    if ($_POST['verification_code'] == $_SESSION['verification_code']) {
        $_SESSION['A2F'] = true;
        header("Location: ../index.php");
    } else {
        // Le code de vérification est incorrect, afficher un message d'erreur
        $error = "Code de vérification incorrect";
    }
}else{
    // Authentification réussie, générer un code de vérification
    $verification_code = rand(100000, 999999);

// Enregistrer le code de vérification dans la session
    $_SESSION['verification_code'] = $verification_code;

// Envoyer le code de vérification à l'utilisateur
    Mail:: SENDMAIL($_SESSION['mail'], 'Votre code de vérification', 'Votre code de vérification est : ' . $verification_code);
}

?>
