<?php
include "../model/Vol.php";
<<<<<<< HEAD

if (isset($_POST['modifiervol'])) {
    $id = htmlspecialchars($_POST['vol']);
    $depart = htmlspecialchars($_POST['depart']);
    $arrivee = htmlspecialchars($_POST['arrivee']);
    $billet = htmlspecialchars($_POST['billet']);
    $nombreBillet = htmlspecialchars($_POST['nombreBillet']);

    Vol::modifierVol($id, $depart, $arrivee, $billet, $nombreBillet);
    header('Location: ../vue/panelCompagnie.php');
=======
session_start();
if (array_key_exists("res", $_POST)) {
    Vol::reserveVol($_SESSION['id_user'], $_POST['res'], $_POST['nb']);
    if ($_POST['type'] == "ar") {
        header("Location: ../vue/vol/volsResult.php?type=ar&classe=". $_POST['classe']."&aller=". $_POST['retour'] ."&retour=".$_POST['aller']  ."&depart=".$_POST['destination'] ."&destination=". $_POST['depart']."&passager=". $_POST['passager']."&searchAR=");
    } else {
        header("Location: ../vue/index.php");
    }
>>>>>>> 59172a3bd7c2ea98bfbde2b3f0ca294e67ca7553
}
?>