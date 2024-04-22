<?php
include '../model/Destination.php';
include "../bdd/SQLConnexion.php";
//session_start();
$conn = new SQLConnexion();

//if (!isset($_SESSION['id_user'])) {
  //  header("Location: ../user/Connexion.php");
    //exit();
//}

if (array_key_exists("ajoutdestination", $_POST)) {
    $destination = new Destination([
        "nomaeroport" => $_POST['nomaeroport'],
        "ref_ville" => $_POST['nomville'],
    ]);
    $destination->insertDestination($conn, $_POST['nomville']);
    header("Location: ../../vue/panelAdministrateur.php");
}

if (array_key_exists("modifierdestination", $_POST)) {
    $destination = new Destination([
        "nomaeroport" => $_POST['nomaeroport'],
        "nomville" => $_POST['nomville'],
    ]);
    $destination->updateDestination($conn, $_POST['id_destination']);
    header("Location: ../../vue/panelAdministrateur.php");
}

if (array_key_exists("supprimerdestination", $_POST)) {
    $destination = new Destination([
        "nomaeroport" => $_POST['nomaeroport'],
        "ref_ville" => $_POST['nomville'],
    ]);
    $destination->deleteDestination($conn, $_POST['ref_ville']);
    header("Location: ../../vue/panelAdministrateur.php");
}
?>