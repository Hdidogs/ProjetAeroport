<?php
include "../model/Vol.php";

session_start();

if (array_key_exists("ajoutervol", $_POST)) {
    $depart = htmlspecialchars($_POST['depart']);
    $arrivee = htmlspecialchars($_POST['arrivee']);
    $billet = htmlspecialchars($_POST['billet']);
    $nombreBillet = htmlspecialchars($_POST['nombreBillet']);

    Vol::ajouterVol($depart, $arrivee, $billet, $nombreBillet);
    header('Location: ../vue/panelCompagnie.php');
}

if (array_key_exists("supprimervol", $_POST)) {
    $id = htmlspecialchars($_POST['vol']);
    Vol::supprimerVol($id);
    header('Location: ../vue/panelCompagnie.php');
}

if (array_key_exists("modifiervol", $_POST)) {
    $id = htmlspecialchars($_POST['vol']);
    $depart = htmlspecialchars($_POST['depart']);
    $arrivee = htmlspecialchars($_POST['arrivee']);
    $billet = htmlspecialchars($_POST['billet']);
    $nombreBillet = htmlspecialchars($_POST['nombreBillet']);

    Vol::modifierVol($id, $depart, $arrivee, $billet, $nombreBillet);
    header('Location: ../vue/panelCompagnie.php');
}