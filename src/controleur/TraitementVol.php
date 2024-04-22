<?php
include "../model/Vol.php";
session_start();
if (array_key_exists("res", $_POST)) {
    Vol::reserveVol($_SESSION['id_user'], $_POST['res'], $_POST['nb']);
    if ($_POST['type'] == "ar") {
        header("Location: ../vue/vol/volsResult.php?type=ar&classe=". $_POST['classe']."&aller=". $_POST['retour'] ."&retour=".$_POST['aller']  ."&depart=".$_POST['destination'] ."&destination=". $_POST['depart']."&passager=". $_POST['passager']."&searchAR=");
    } else {
        header("Location: ../vue/index.php");
    }
}
?>