<?php
include "../model/Vol.php";
session_start();
if (array_key_exists("res", $_POST)) {
    Vol::reserveVol($_SESSION['id_user'], $_POST['res'], $_POST['nb']);
    if ($_POST['type'] == "ar") {
        header("Location: ../vue/vol/volsResult.php?type=ar&classe="Economique"&aller="2024-04-18"&retour="2024-04-26"&depart="2"&destination="1"&passager="4"&searchAR=");
    } else {
        header("Location: ../vue/index.php");
    }
}
?>