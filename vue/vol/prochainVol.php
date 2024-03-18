<?php
include "../../src/bdd/SQLConnexion.php";

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
    <link rel="stylesheet" href="../../assets/css/styleIndex.css">

    <!-- Liens vers les fichiers JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>
<body>
<div>
    <table id="volList">
        <thead>
        <tr>
            <th>Date</th>
            <th>Heure de Départ</th>
            <th>Heure d'arriver</th>
            <th>Nom de l'Aéroport</th>
            <th>Nom de la compagnie</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($res as $vol) {
            ?>
            <tr>
                <td><?=$vol['date']?></td>
                <td><?=$vol['heure_dep']?></td>
                <td><?=$vol['heure_arr']?></td>
                <td><?=$vol['nom_aeroport']?></td>
                <td><?=$vol['nom']?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready( function () {
        $('#volList').DataTable();
    } );
</script>
</body>
</html>