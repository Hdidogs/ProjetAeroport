<?php
include '../model/Ville.php';
include '../bdd/SQLConnexion.php';
//session_start();
$conn = new SQLConnexion();

//if (!isset($_SESSION['id_user'])) {
//  header("Location: ../user/Connexion.php");
//exit();
//}

if (array_key_exists("ajoutville", $_POST)) {
    $ville = new Ville([
        "nomville" => $_POST['nomville'],
        "refpays" => $_POST['refpays'],
    ]);
    $ville->insertVille($conn, $_POST['refpays']);
    header("Location: ../../vue/panelAdministrateur.php");
}

if (array_key_exists("modifierville", $_POST)) {
    $ville = new Ville([
        "nomville" => $_POST['nomville'],
        "refpays" => $_POST['refpays'],
    ]);
    $ville->updateVille($conn, $_POST['ref_pays']);
    header("Location: ../../vue/panelAdministrateur.php");
}

if (array_key_exists("supprimerville", $_POST)) {
    $ville = new Ville([
        "nomville" => $_POST['nomville'],
        "refpays" => $_POST['refpays'],
    ]);
    $ville->deleteVille($conn, $_POST['refpays']);
    header("Location: ../../vue/panelAdministrateur.php");
}
