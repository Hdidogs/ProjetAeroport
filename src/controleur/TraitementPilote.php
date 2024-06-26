<?php
include "../model/user/Pilote.php";

session_start();

if(array_key_exists("ajouterpilote", $_POST)){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $mail = htmlspecialchars($_POST['mail']);

    $code = rand(100000, 999999);
    $mdp = password_hash($code, PASSWORD_DEFAULT);
    Mail::SENDMAIL($_SESSION['mail'], 'Nuage Air Pilote', 'Voici votre mot de passe temporaire veuillez le changer dès votre première connexion : ' . $code);

    $ville = htmlspecialchars($_POST['ville']);
    $fonction = htmlspecialchars($_POST['fonction']);
    $compagnie = htmlspecialchars($_POST['compagnie']);

    Pilote::ajouterPilote($nom, $prenom, $date_naissance, $mail, $mdp, $ville, $fonction, $compagnie);
    header('Location: ../../vue/panelCompagnie.php');
}

if (array_key_exists("supprimerpilote", $_POST)) {
    $id = htmlspecialchars($_POST['pilote']);
    Pilote::supprimerPilote($id);
    header('Location: ../../vue/panelCompagnie.php');
}

if(array_key_exists("modifierpilote", $_POST)){
    $id = htmlspecialchars($_POST['pilote']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $ville = htmlspecialchars($_POST['ville']);
    $fonction = htmlspecialchars($_POST['fonction']);
    $compagnie = htmlspecialchars($_POST['compagnie']);

    Pilote::modifierPilote($id, $nom, $prenom, $date_naissance, $mail, $mdp, $ville, $fonction, $compagnie);
    header('Location: ../../vue/panelCompagnie.php');
}
?>