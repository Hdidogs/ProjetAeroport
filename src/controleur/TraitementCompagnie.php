<?php
include '../model/Compagnie.php';
include '../bdd/SQLConnexion.php';
session_start();
$conn = new SQLConnexion();

//if (!isset($_SESSION['id_user'])) {
//  header("Location: ../user/Connexion.php");
//exit();
//}

if (array_key_exists("ajoutcompagnie", $_POST)) {
    $compagnie = new Compagnie([
        "nomcompagnie" => $_POST['nomcompagnie'],
        "numero" => $_POST['numero'],
    ]);
    $compagnie->insertCompagnie($conn);
    header("Location: ../../vue/panelAdministrateur.php");
    exit();
}

if (array_key_exists("modifiercompagnie", $_POST)) {
    $compagnie = new Compagnie([
        "nomcompagnie" => $_POST['nomcompagnie'],
        "numero" => $_POST['numero'],
    ]);
    $compagnie->updateCompagnie($conn, $_POST['id_companie']);
    header("Location: ../../vue/panelAdministrateur.php");
    exit();
}

if (array_key_exists("supprimercompagnie", $_POST)) {
    $compagnie = new Compagnie(['id' => $_POST['id_companie']]);
    $compagnie->deleteCompagnie($conn, $_POST['id_companie']);
    header("Location: ../../vue/panelAdministrateur.php");
    exit();
}