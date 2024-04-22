<?php
include "../model/user/Pilote.php";

if (isset($_POST['ajouterpilote'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date_naissance = htmlspecialchars($_POST['date_naissance']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $ville = htmlspecialchars($_POST['ville']);
    $fonction = htmlspecialchars($_POST['fonction']);
    $compagnie = htmlspecialchars($_POST['compagnie']);

    Pilote::ajouterPilote($nom, $prenom, $date_naissance, $mail, $mdp, $ville, $fonction, $compagnie);
    header('Location: ../../vue/panelCompagnie.php');
}

if (isset($_POST['supprimerpilote'])) {
    $id = htmlspecialchars($_POST['pilote']);
    Pilote::supprimerPilote($id);
    header('Location: ../../vue/panelCompagnie.php');
}

if (isset($_POST['modifierpilote'])) {
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