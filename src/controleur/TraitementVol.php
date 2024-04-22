<?php
include "../model/Vol.php";

if (isset($_POST['modifiervol'])) {
    $id = htmlspecialchars($_POST['vol']);
    $depart = htmlspecialchars($_POST['depart']);
    $arrivee = htmlspecialchars($_POST['arrivee']);
    $billet = htmlspecialchars($_POST['billet']);
    $nombreBillet = htmlspecialchars($_POST['nombreBillet']);

    Vol::modifierVol($id, $depart, $arrivee, $billet, $nombreBillet);
    header('Location: ../vue/panelCompagnie.php');
}
?>