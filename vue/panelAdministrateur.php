<?php
session_start();
include "../src/bdd/SQLConnexion.php";

if (isset($_SESSION["id_user"])) {
    if ($_SESSION["fonction"] != 4) {
        header("Location: connexion.php");

    } else {
        $id = $_SESSION["id_user"];
    }
} else {
    header("Location: connexion.php");
}



if (array_key_exists("ans", $_GET)) {
    $ans = $_GET["ans"];
} else {
    $ans = 2024;
}

$conn = new SQLConnexion();

$reqAnnuelle = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqAnnuelle->execute(["dateD"=>"2024-01-01", "dateF"=>"2024-12-31"]);
$resAnnuelle = $reqAnnuelle->fetch();

$reqAnnuelleH = $conn->conbdd()->prepare("SELECT SUM(r.prix) as total FROM reservation as r WHERE r.date BETWEEN :dateD AND :dateF");
$reqAnnuelleH->execute(["dateD"=>"2024-01-01", "dateF"=>"2024-12-31"]);
$resAnnuelleH = $reqAnnuelleH->fetch();

$reqMensuelle = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqMensuelle->execute(["dateD"=>"2024-03-01", "dateF"=>"2024-03-31"]);
$resMensuelle = $reqMensuelle->fetch();

$reqMensuelleH = $conn->conbdd()->prepare("SELECT SUM(r.prix) as total FROM reservation as r WHERE r.date BETWEEN :dateD AND :dateF");
$reqMensuelleH ->execute(["dateD"=>"2024-03-01", "dateF"=>"2024-03-31"]);
$resMensuelleH = $reqMensuelleH->fetch();

$reqJav = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqJav->execute(["dateD"=>$ans."-01-01", "dateF"=>$ans."-01-31"]);
$resJav = $reqJav->fetch();

$reqFev = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqFev->execute(["dateD"=>$ans."-02-01", "dateF"=>$ans."-02-29"]);
$resFev = $reqFev->fetch();

$reqMars = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqMars->execute(["dateD"=>$ans."-03-01", "dateF"=>$ans."-03-31"]);
$resMars = $reqMars->fetch();

$reqAvr = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqAvr->execute(["dateD"=>$ans."-04-01", "dateF"=>$ans."-04-30"]);
$resAvr = $reqAvr->fetch();

$reqMai = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqMai->execute(["dateD"=>$ans."-05-01", "dateF"=>$ans."-05-31"]);
$resMai = $reqMai->fetch();

$reqJun = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqJun->execute(["dateD"=>$ans."-06-01", "dateF"=>$ans."-06-30"]);
$resJun = $reqJun->fetch();

$reqJui = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqJui->execute(["dateD"=>$ans."-07-01", "dateF"=>$ans."-07-31"]);
$resJui = $reqJui->fetch();

$reqAou = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqAou->execute(["dateD"=>$ans."-08-01", "dateF"=>$ans."-08-31"]);
$resAou = $reqAou->fetch();

$reqSep = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqSep->execute(["dateD"=>$ans."-09-01", "dateF"=>$ans."-09-30"]);
$resSep = $reqSep->fetch();

$reqOct = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqOct->execute(["dateD"=>$ans."-10-01", "dateF"=>$ans."-10-31"]);
$resOct = $reqOct->fetch();

$reqNov = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqNov->execute(["dateD"=>$ans."-11-01", "dateF"=>$ans."-11-30"]);
$resNov = $reqNov->fetch();

$reqDec = $conn->conbdd()->prepare("SELECT SUM(v.prix) as total FROM vol as v WHERE v.date BETWEEN :dateD AND :dateF");
$reqDec->execute(["dateD"=>"2024-12-01", "dateF"=>$ans."-12-31"]);
$resDec = $reqDec->fetch();

$reqCompagnie = $conn->conbdd()->query("SELECT nom, pourcent FROM v_pourcentbycompagnie ORDER BY pourcent DESC");
$resCompagnie = $reqCompagnie->fetchAll();
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Liens vers les fichiers JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="../assets/js/reservationVol.js"></script>
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
                                        if ($_SESSION['fonction'] == 4) {
                                            ?>
                                            <li><a class="dropdown-item" href="#">Panel Administration</a></li>
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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Revenue Total Mensuelle</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?=$resMensuelle["total"] + $resMensuelleH["total"]?> €</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Revenue Total Annuels</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?=$resAnnuelle["total"] + $resAnnuelleH["total"]?> €</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-euro-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Line -->

                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text fw-bold m-0" style="color: black;">Vue des Revenues de <?=$ans?></h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <?php
                                            if (array_key_exists("mois", $_GET)) {
                                            ?>
                                                <a class="dropdown-item" href="?mois&ans=2022">&nbsp;2022</a>
                                                <a class="dropdown-item" href="?mois&ans=2023">&nbsp;2023</a>
                                                <a class="dropdown-item" href="?mois&ans=2024">&nbsp;2024</a>
                                                <a class="dropdown-item" href="?mois&ans=2025">&nbsp;2025</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a class="dropdown-item" href="?ans=2022">&nbsp;2022</a>
                                                <a class="dropdown-item" href="?ans=2023">&nbsp;2023</a>
                                                <a class="dropdown-item" href="?ans=2024">&nbsp;2024</a>
                                                <a class="dropdown-item" href="?ans=2025">&nbsp;2025</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:
                                        [&quot;Janvier&quot;,&quot;Février&quot;,&quot;Mars&quot;,&quot;Avril&quot;,&quot;Mai&quot;,&quot;Juin&quot;,&quot;Juillet&quot;,&quot;Août&quot;,&quot;Septembre&quot;,&quot;Octobre&quot;,&quot;Novembre&quot;,&quot;Decembre&quot;]
                                        ,&quot;datasets&quot;:
                                        [{&quot;label&quot;:&quot;Revenue&quot;,&quot;fill&quot;:true,&quot;data&quot;:
                                        [&quot;<?=$resJav["total"]?>&quot;,&quot;<?=$resFev["total"]?>&quot;,&quot;<?=$resMars["total"]?>&quot;,&quot;<?=$resAvr["total"]?>&quot;,&quot;<?=$resMai["total"]?>&quot;,&quot;<?=$resJun["total"]?>&quot;,&quot;<?=$resJui["total"]?>&quot;,&quot;<?=$resAou["total"]?>&quot;,&quot;<?=$resSep["total"]?>&quot;,&quot;<?=$resOct["total"]?>&quot;,&quot;<?=$resNov["total"]?>&quot;,&quot;<?=$resDec["total"]?>&quot;]
                                        ,&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(255, 224, 210, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>
                                </div>
                            </div>
                        </div>

                        <!-- Camember -->

                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <?php
                                    if (array_key_exists("mois", $_GET)) {
                                    ?>
                                    <h6 class="text fw-bold m-0" style="color: black;">Sources de Revenues Mensuelles</h6>
                                    <?php
                                    } else {
                                    ?>
                                    <h6 class="text fw-bold m-0" style="color: black;">Sources de Revenues Annuelles</h6>
                                    <?php
                                    }
                                    ?>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <?php
                                            if (array_key_exists("ans", $_GET)) {
                                                ?>
                                                <a class="dropdown-item" href="?ans=<?=$_GET["ans"]?>">&nbsp;Ans</a>
                                                <a class="dropdown-item" href="?mois&ans=<?=$_GET["ans"]?>">Mois</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="dropdown-item" href="?">&nbsp;Ans</a>
                                                <a class="dropdown-item" href="?mois">&nbsp;Mois</a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (array_key_exists("mois", $_GET)) {
                                    ?>
                                    <div class="card-body">
                                        <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:
                                        [&quot;Vols&quot;,&quot;Hotel&quot;,&quot;Transport&quot;]
                                        ,&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:
                                        [&quot;<?=$resMensuelle["total"]?>&quot;,&quot;<?=$resMensuelleH["total"]?>&quot;,&quot;1500&quot;]
                                        }]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>
                                        <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Vols</span>
                                            <span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Hotel</span>
                                            <span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Transport</span>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                ?>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:
                                    [&quot;Vols&quot;,&quot;Hotel&quot;,&quot;Transport&quot;]
                                    ,&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:
                                    [&quot;<?=$resAnnuelle["total"]?>&quot;,&quot;<?=$resAnnuelleH["total"]?>&quot;,&quot;1500&quot;]
                                    }]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>
                                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Vols</span>
                                        <span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Hotel</span>
                                        <span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Transport</span>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Companie Earnings -->

                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text fw-bold m-0" style="color: black;">Compagnie Revenue</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    foreach ($resCompagnie as $compagnie) {
                                    ?>
                                        <h4 class="small fw-bold"><?=$compagnie["nom"]?><span class="float-end"><?=$compagnie["pourcent"]?>%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar" aria-valuenow="<?=$compagnie["pourcent"]?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$compagnie["pourcent"]?>%; background-color: #ffe0d2;"><span class="visually-hidden"><?=$compagnie["pourcent"]?>%</span></div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text fw-bold m-0" style="color: black;">Compagnie</h6>
                                </div>
                                <div class="card-body">
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#ajoutcompagnie" style="background-color: #ffe0d2">Ajouter une compagnie</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifiercompagnie">Modifier une compagnie</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimercompagnie">Supprimer une compagnie</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text fw-bold m-0" style="color: black;">Destination</h6>
                                </div>
                                <div class="card-body">
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#ajoutdestination" style="background-color: #ffe0d2">Ajouter une destination</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifierdestination">Modifier une destination</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerdestination">Supprimer une destination</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text fw-bold m-0" style="color: black;">Pays</h6>
                                </div>
                                <div class="card-body">
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#ajoutpays" style="background-color: #ffe0d2">Ajouter un pays</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifierpays">Modifier un pays</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerpays">Supprimer un pays</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text fw-bold m-0" style="color: black;">Ville</h6>
                                </div>
                                <div class="card-body">
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#ajoutville" style="background-color: #ffe0d2">Ajouter une ville</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifierville">Modifier une ville</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerville">Supprimer une ville</button>
                                </div>
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
    <!-- Modal -->
    <div class="modal fade" id="ajoutcompagnie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Compagnie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementCompagnie.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom de la compagnie</label>
                            <input type="text" class="form-control" name="nomcompagnie" required>
                            <label class="form-label>">Numero</label>
                            <input type="text" class="form-control" name="numero" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="ajoutcompagnie" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifiercompagnie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Compagnie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementCompagnie.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-vol-select" name="type" id="type" required>
                                <?php $sql = "SELECT nom FROM compagnie";
                                $stmt = $conn->conbdd()->prepare($sql);
                                $stmt->execute();
                                $compagnies = $stmt->fetchAll(); ?>
                                    <?php foreach ($compagnies as $compagnie): ?>
                                        <option value="<?php echo $compagnie['nom']; ?>">
                                            <?php echo $compagnie['nom']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="modifiercompagnie" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="supprimercompagnie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer Compagnie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementCompagnie.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-vol-select" name="type" id="type" required>
                                <?php $sql = "SELECT nom FROM compagnie";
                                $stmt = $conn->conbdd()->prepare($sql);
                                $stmt->execute();
                                $compagnies = $stmt->fetchAll(); ?>
                                <?php foreach ($compagnies as $compagnie): ?>
                                    <option value="<?php echo $compagnie['id_compagnie']; ?>">
                                        <?php echo $compagnie['nom']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="supprimercompagnie" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajoutdestination" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Destination</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementDestination.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom de l'aeroport</label>
                            <input type="text" class="form-control" name="nomaeroport" required>
                            <label class="form-label>">Ville</label>
                            <input type="text" class="form-control" name="nomville" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="ajoutdestination" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modifierdestination" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Destination</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../src/controleur/TraitementDestination.php">
                        <div class="mb-3"><label class="form-label>">Nom de l'aeroport</label>
                            <label class="form-label>">Nom de l'aeroport</label>
                            <input type="text" class="form-control" name="nomaeroport" required>
                            <label class="form-label>">Ville</label>
                            <input type="text" class="form-control" name="nomville" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="modifierdestination" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="supprimerdestination" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer Destination</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementDestination.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom de l'aeroport</label>
                            <input type="text" class="form-control" name="nomaeroport" required>
                            <label class="form-label>">Ville</label>
                            <input type="text" class="form-control" name="nomville" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="supprimerdestination" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajoutpays" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Pays</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementPays.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom du Pays</label>
                            <input type="text" class="form-control" name="nompays" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="ajoutpays" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifierpays" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Pays</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementPays.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom du Pays</label>
                            <input type="text" class="form-control" name="nompays" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="modifierpays" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="supprimerpays" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Pays</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementPays.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom du Pays</label>
                            <input type="text" class="form-control" name="nompays" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="supprimerpays" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajoutville" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Ville</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementVille.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom de le Ville</label>
                            <input type="text" class="form-control" name="nomville" required>
                            <label class="form-label>">Pays</label>
                            <input type="text" class="form-control" name="refpays" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="ajoutville" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifierville" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Ville</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementVille.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom de le Ville</label>
                            <input type="text" class="form-control" name="nomville" required>
                            <label class="form-label>">Pays</label>
                            <input type="text" class="form-control" name="refpays" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="modifierville" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="supprimerville" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer Ville</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementVille.php">
                <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label>">Nom de le Ville</label>
                            <input type="text" class="form-control" name="nomville" required>
                            <label class="form-label>">Pays</label>
                            <input type="text" class="form-control" name="refpays" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="supprimerville" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
            <script src="../assets/js/chart.min.js"></script
            <script src="../assets/js/bs-init.js"></script>
            <script src="../assets/js/theme.js"></script>
</body>
</html>