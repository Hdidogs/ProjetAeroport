<?php
include '../model/Pays.php';
include "../bdd/SQLConnexion.php";
//session_start();
$conn = new SQLConnexion();

//if (!isset($_SESSION['id_user'])) {
//  header("Location: ../user/Connexion.php");
//exit();
//}

if (array_key_exists("ajoutpays", $_POST)) {
    $pays = new Pays([
        "nompays" => $_POST['nompays'],
    ]);
    $pays->insertPays($conn);
    header("Location: ../../vue/panelAdministrateur.php");
}

if (array_key_exists("modifierpays", $_POST)) {
    $pays = new Pays([
        "nompays" => $_POST['nompays'],
    ]);
    $pays->updatePays($conn, $_POST['ref_pays']);
    header("Location: ../../vue/panelAdministrateur.php");
}

if (array_key_exists("supprimerpays", $_POST)) {
    $pays = new Pays([
        "nompays" => $_POST['nompays'],
    ]);
    $pays->deletePays($conn, $_POST['ref_pays']);
    header("Location: ../../vue/panelAdministrateur.php");
}
?>