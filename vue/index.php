<?php
include "../src/bdd/SQLConnexion.php";

$conn = new SQLConnexion();

$req = $conn->conbdd()->query("SELECT * FROM listvol");
$res = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Aéroport Dugny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../assets/css/styleIndex.css">

    <!-- Liens vers les fichiers JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>
<body>
<div class="content">
    <div class="offer">
        <div style="width: 100%; height: 500px; left: 0px; top: 89px; background: #D9D9D9"></div>
        <button style="width: 161px; height: 42px; left: 1235px; top: 400px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 25px; border: none;">Partir Maintenant</button>
    </div>

    <div class="help">
        <div style="width: 90%; height: 402px; left: 5%; top: 600px; position: absolute; background: #D1D1D1; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 38px">
            <p style="left: 40.5%; top: 5%; position: absolute; color: black; font-size: 38px; font-weight: 400; word-wrap: break-word">Besoin d’aide ?</p>
            <div style="width: 188px; height: 191px; left: 10%; top: 30%; position: absolute; background: #333333; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25); border-radius: 38px"></div>
            <div style="width: 188px; height: 191px; left: 368px; top: 30%; position: absolute; background: #333333; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25); border-radius: 38px"></div>
            <div style="width: 188px; height: 191px; left: 615px; top: 30%; position: absolute; background: #333333; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25); border-radius: 38px"></div>
            <div style="width: 188px; height: 191px; left: 862px; top: 30%; position: absolute; background: #333333; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25); border-radius: 38px"></div>
            <div style="width: 188px; height: 191px; right: 10%; top: 30%; position: absolute; background: #333333; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25); border-radius: 38px"></div>
        </div>
    </div>

        <div style="left: 496px; top: 850px; position: absolute; color: black; font-size: 38px; font-weight: 400; word-wrap: break-word">Réserver dès maintenant</div>

        <div style="left: 153px; top: 592px; position: absolute; color: white; font-size: 35px; font-weight: 400; word-wrap: break-word">Parking</div>
        <div style="left: 381px; top: 592px; position: absolute; color: white; font-size: 35px; font-weight: 400; word-wrap: break-word">Transport</div>
        <div style="left: 882px; top: 592px; position: absolute; color: white; font-size: 35px; font-weight: 400; word-wrap: break-word">Boutique</div>
        <div style="left: 1131px; top: 592px; position: absolute; color: white; font-size: 35px; font-weight: 400; word-wrap: break-word">Services</div>
        <div style="left: 655px; top: 571px; position: absolute; color: white; font-size: 35px; font-weight: 400; word-wrap: break-word">Petite<br/>Faim ?</div>
        <div style="width: 524px; height: 506px; left: 458px; top: 953px; position: absolute; background: #333333; border-radius: 77px"></div>
        <div style="width: 283px; height: 52px; left: 516px; top: 1217px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="width: 170px; height: 52px; left: 516px; top: 1006px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="width: 75px; height: 52px; left: 849px; top: 1217px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="width: 170px; height: 52px; left: 754px; top: 1006px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="width: 170px; height: 92px; left: 516px; top: 1097px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="width: 170px; height: 92px; left: 754px; top: 1097px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="width: 408px; height: 52px; left: 516px; top: 1312px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="width: 224px; height: 45px; left: 608px; top: 1392px; position: absolute; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 21px"></div>
        <div style="left: 651px; top: 1404px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word">Trouver mon vol</div>
        <div style="left: 532px; top: 1327px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word"><i class="fa-solid fa-wine-glass-empty"></i> Classe</div>
        <div style="left: 532px; top: 1232px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word"><i class="fa-solid fa-arrow-right-arrow-left"></i> Type</div>
        <div style="left: 532px; top: 1132px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word"><i class="fa-solid fa-calendar-days"></i> Date de Départ</div>
        <div style="left: 535px; top: 1021px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word"><i class="fa-solid fa-plane-departure"></i> Départ</div>
        <div style="left: 769px; top: 1021px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word"><i class="fa-solid fa-plane-arrival"></i> Destination</div>
        <div style="left: 775px; top: 1132px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word"><i class="fa-solid fa-calendar-days"></i> Date de Retour</div>
        <div style="left: 853px; top: 1232px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word"><i class="fa-solid fa-ticket"></i> Nombre</div>
</div>

<header class="headerBar" style="left: 0; top: 0">
    <a style="left: 980px; top: 40px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word; text-decoration: none" href="vol/prochainVol.php">Prochain départ</a>
    <a style="left: 833px; top: 40px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word; text-decoration: none">Service</a>
    <a style="left: 555px; top: 40px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word; text-decoration: none">Réservera</a>
    <a style="left: 185px; top: 31px; position: absolute; color: black; font-size: 32px; font-weight: 400; word-wrap: break-word; text-decoration: none">Dugny Aéroport</a>
    <a style="left: 714px; top: 40px; position: absolute; color: black; font-size: 18px; font-weight: 400; word-wrap: break-word; text-decoration: none">Vols</a>
    <div style="width: 67px; height: 67px; left: 1346px; top: 17px; background: #D9D9D9; position: absolute; border-radius: 9999px"></div>

    <!-- LOGO -->
    <div style="width: 77px; height: 77px; left: 20px; top: 12px; position: absolute; background: #D9D9D9; border-radius: 9999px"></div>

    <!-- Search -->
    <div style="width: 29px; height: 29px; left: 1297px; top: 36px; background: #D9D9D9; position: absolute; border-radius: 9999px"></div>
</header>
</body>
</html>