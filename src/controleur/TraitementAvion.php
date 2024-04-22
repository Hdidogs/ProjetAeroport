<?php
include "../model/Vol.php";

if (isset($_POST['modifieravion'])) {
    $id = htmlspecialchars($_POST['avion']);
    $nom = htmlspecialchars($_POST['nom']);
    $compagnie = htmlspecialchars($_POST['compagnie']);
    $capacite = htmlspecialchars($_POST['capacite']);

    Avion::modifierAvion($id, $nom, $compagnie, $capacite);
    header('Location: ../vue/panelCompagnie.php');
}