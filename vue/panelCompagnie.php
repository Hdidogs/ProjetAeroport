<?php
session_start();
include "../src/bdd/SQLConnexion.php";

if (isset($_SESSION["id_user"])) {
    if ($_SESSION["fonction"] != 3) {
        header("Location: connexion.php");

    } else {
        $id = $_SESSION["id_user"];
    }
} else {
    header("Location: connexion.php");
}

$conn = new SQLConnexion();

$reqnc = $conn->conbdd()->prepare("SELECT id_user,nom, prenom FROM `user` WHERE ref_fonction = :fonction and ref_compagnie = :compagnie and id_user");
$reqnc->execute(['fonction'=>2,'compagnie'=>$_SESSION["compagnie"]]);
$resnc = $reqnc->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nuage Air Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">

    <!-- Liens vers les fichiers JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>

<body id="page-top">
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <h3 class="text-dark mb-0"><a href="index.php" style="text-decoration: none; color: black">Nuage Airport</a></h3>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <div class="dropdown" style="padding-left: 10px; margin-top: 4px">
                                <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/hdidogs.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                    <?php
                                    if ($_SESSION['fonction'] == 4) {
                                        echo "Administrateur";
                                    } else {
                                        echo $_SESSION['nom'] . " " . $_SESSION['prenom'];
                                    }
                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light text-small" style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-top-left-radius: 15px;border-top-right-radius: 15px;border: none;">
                                    <li><a class="dropdown-item" href="#">Votre Compte</a></li>
                                    <?php
                                    if ($_SESSION['fonction'] == 3) {
                                        ?>
                                        <li><a class="dropdown-item" href="#">Panel Compagnie</a></li>
                                        <?php
                                    }
                                    ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="post" action="../src/controleur/TraitementUser.php">
                                            <button type="submit" class="dropdown-item" name="deconnexion">Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->

            <div class="row">
                <div class="col-lg-2 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text fw-bold m-0" style="color: black;">Vol</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn" style="background-color: #ffe0d2">Ajouter un vol</button>
                            <br>
                            <br>
                            <button class="btn btn-primary">Modifier un vol</button>
                            <br>
                            <br>
                            <button class="btn btn-danger">Supprimer un vol</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text fw-bold m-0" style="color: black;">Avion</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn" style="background-color: #ffe0d2">Ajouter un avion</button>
                            <br>
                            <br>
                            <button class="btn btn-primary">Modifier un avion</button>
                            <br>
                            <br>
                            <button class="btn btn-danger">Supprimer un avion</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text fw-bold m-0" style="color: black;">Pilote</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn" style="background-color: #ffe0d2">Ajouter un pilote</button>
                            <br>
                            <br>
                            <button class="btn btn-primary">Modifier un pilote</button>
                            <br>
                            <br>
                            <button class="btn btn-danger">Supprimer un pilote</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text fw-bold m-0" style="color: black;">Pilote</h6>
                        </div>
                        <div class="card-body">
                            <table id="pilote">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Disponible</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($resnc as $res) {
                                    ?>
                                    <tr>
                                        <td><?=$res['nom']?></td>
                                        <td><?=$res['prenom']?></td>
                                        <td>
                                            <?php
                                            $reqC = $conn->conbdd()->prepare("SELECT * FROM `conge` WHERE ref_user = :id and :date BETWEEN date_debut and date_fin");
                                            $reqC -> execute(['id'=>$res['id_user'], 'date'=>"2024-04-23"]);
                                            $resC = $reqC->fetch();

                                            if ($resC) {
                                                ?>
                                                <i class="fa-solid fa-xmark"></i>
                                                <?php
                                            } else {
                                                ?>
                                                <i class="fa-solid fa-check"></i>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="text-white bg-dark" style="">
            <div class="container py-4 py-lg-5">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                        <h3 class="fs-6 text-white">Services</h3>
                        <ul class="list-unstyled">
                            <li><a class="link-light" href="#">Parking</a></li>
                            <li><a class="link-light" href="#">Transport</a></li>
                            <li><a class="link-light" href="#">Restauration</a></li>
                            <li><a class="link-light" href="#">Boutique</a></li>
                            <li><a class="link-light" href="#">Autres Services</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                        <h3 class="fs-6 text-white">À Propos</h3>
                        <ul class="list-unstyled">
                            <li><a class="link-light" href="#">Aéroport</a></li>
                            <li><a class="link-light" href="#">Compagnies Aériennes</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                        <h3 class="fs-6 text-white">Carrière</h3>
                        <ul class="list-unstyled">
                            <li><a class="link-light" href="#">Nous Recrutons</a></li>
                            <li><a class="link-light" href="#">Nos Partenaires Recrute</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social">
                        <div class="fw-bold d-flex align-items-center mb-2"><span>Nuage Airport</span></div>
                        <p class="text-muted copyright">Le meilleur aéroport pour voyager en toute tranquillité.</p>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center pt-3">
                    <p class="mb-0">Copyright © 2024 - Nuage Airport</p>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a style="color: white" target="_blank" href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a style="color: white" target="_blank" href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a style="color: white" target="_blank" href="https://twitter.com/"><i class="fa-brands fa-x-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#pilote').DataTable();
    } );
    $(document).ready( function () {
        $('#piloteC').DataTable();
    } );
</script>
</body>
</html>
