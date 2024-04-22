<?php
include "../model/Vol.php";

session_start();

if (array_key_exists("modifieravion", $_POST)) {
    $id = htmlspecialchars($_POST['avion']);
    $nom = htmlspecialchars($_POST['nom']);
    $compagnie = htmlspecialchars($_POST['compagnie']);
    $capacite = htmlspecialchars($_POST['capacite']);

    Avion::modifierAvion($id, $nom, $compagnie, $capacite);
    header('Location: ../vue/panelCompagnie.php');
}

if (array_key_exists("supprimeravion", $_POST)) {
    $id = htmlspecialchars($_POST['avion']);
    Avion::supprimerAvion($id);
    header('Location: ../vue/panelCompagnie.php');
}

if (array_key_exists("ajouteravion", $_POST)) {
    $nom = htmlspecialchars($_POST['nom']);
    $compagnie = htmlspecialchars($_POST['compagnie']);
    $capacite = htmlspecialchars($_POST['capacite']);

    Avion::ajouterAvion($nom, $compagnie, $capacite);
    header('Location: ../vue/panelCompagnie.php');
}