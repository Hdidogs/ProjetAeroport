<?php
include "../bdd/SQLConnexion.php";
//session_start();
$conn = new SQLConnexion();

//if (!isset($_SESSION['id_user'])) {
  //  header("Location: ../user/Connexion.php");
    //exit();
//}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nomAeroport = $_POST["nomAeroport"];
    $pays = $_POST["nompays"];
    $ville = $_POST["nomville"];

    // Insérer les données dans la base de données
    $query = $conn->conbdd()->prepare("INSERT INTO pays (nom) VALUES (:nom)");
    $query->execute(array(
       'nom' => $pays
    ));

    $idpays = $conn->conbdd()->lastInsertId();

    $query = $conn->conbdd()->prepare("INSERT INTO ville(nom,ref_pays) VALUES (:nom,:pays)");
    $query->execute(array(
       'nom' => $ville,
        'pays' => $idpays
    ));

    $idville = $conn->conbdd()->lastInsertId();

    $query = $conn->conbdd()->prepare("INSERT INTO destination (nom_aeroport, ref_ville) VALUES (:nomAeroport,:ville)");
    $query->execute(array(
        'nomAeroport' => $nomAeroport,
        'ville' => $idville
    ));

    // Redirection après l'ajout des données
    header("Location: ../../vue/index.php");
    exit();
}