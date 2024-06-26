<?php
include "../src/bdd/SQLConnexion.php";

session_start();

if (isset ($_SESSION["id_user"]) && isset($_SESSION["A2F"])) {
    $id = $_SESSION["id_user"];
} elseif ($_SESSION['id_user'] == 506) {
    $id = $_SESSION["id_user"];
} elseif (!isset($_SESSION["A2F"])) {
    header("Location: user/A2F.php");
}else {
    header("Location: connexion.php");
}

$conn = new SQLConnexion();

$req = $conn->conbdd()->query("SELECT * FROM v_aeroport");
$res = $req->fetchAll();

$reqv = $conn->conbdd()->query("SELECT * FROM listvol");
$resv = $reqv->fetchAll();
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Nuage Airport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../assets/css/styleIndex.css">
    <link rel="stylesheet" href="../assets/scss/reservationVol.scss">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Liens vers les fichiers JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="../assets/js/reservationVol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="content">
        <!--
        <div class="carousel slide" data-bs-ride="false" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block" src="../assets/images/58796297-43317668.jpg"
                        alt="Slide Image" height="1000"></div>
                <div class="carousel-item"><img class="w-100 d-block"
                        src="../assets/images/istockphoto-1138175909-612x612.jpg" alt="Slide Image" height="1000"></div>
                <div class="carousel-item"><img class="w-100 d-block"
                        src="../assets/images/photos-la-reunion-cascade-aigrettes.jpg" alt="Slide Image" height="1000">
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span
                        class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a
                    class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span
                        class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0"
                    class="active"></button> <button type="button" data-bs-target="#carousel-1"
                    data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-1"
                    data-bs-slide-to="2"></button></div>
        </div>
        -->

        <section id="prochain" class="position-relative py-4 py-xl-5" style="background: var(--bs-body-bg); ">
            <div class="container position-relative">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text fw-bold m-0" style="color: black;">Prochain Départ</h6>
                    </div>
                    <div class="content-card">
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
                            foreach ($resv as $vol) {
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
                </div>
            </div>
        </section>

        <div id="services" class="card-group" style="margin: 15px;">
            <div class="card scale"
                style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;border-top-left-radius: 25px;border-top-right-radius: 25px; margin: 10px;">
                <div class="card-body">
                    <h4 class="card-title">Parking</h4>
                    <p class="card-text">Découvrez notre service de parking pratique et sécurisé pour votre voyage en avion
                        ! Profitez d'un stationnement facilement accessible, avec des options de réservation en ligne et une
                        surveillance 24h/24 pour une tranquillité d'esprit totale.</p>
                </div>
                <div style="margin: 20px">
                    <button class="btn" style="background-color: #ffe0d2; color: #333333" type="button">Réserver Maintenant</button>
                </div>
            </div>
            <div class="card scale"
                style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;border-top-left-radius: 25px;border-top-right-radius: 25px; margin: 10px;">
                <div class="card-body">
                    <h4 class="card-title">Transport</h4>
                    <p class="card-text">Explorez notre service de transport dédié pour un voyage sans tracas depuis et vers
                        l'aéroport ! Nous vous proposons aussi des services de location de voitures pour répondre à vos
                        besoins de déplacement.</p>
                </div>
                <div style="margin: 20px">
                    <button class="btn" style="background-color: #ffe0d2; color: #333333" type="button">Réserver
                        Maintenant</button>
                </div>
            </div>
            <div class="card scale"
                style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;border-top-left-radius: 25px;border-top-right-radius: 25px; margin: 10px;">
                <div class="card-body">
                    <h4 class="card-title">Petite Faim ?</h4>
                    <p class="card-text">Découvrez nos différent restaurant présent dans notre aéroport. Allant de la
                        restauration rapide au luxueux repas d'un restaurant 5 étoiles, vous trouverais tout se dont vous
                        avez besoin pour répondre a votre besoin de nourritures.</p>
                </div>
                <div style="margin: 20px">
                    <button class="btn" style="background-color: #ffe0d2; color: #333333" type="button">Se
                        Renseigner</button>
                </div>
            </div>
            <div class="card scale"
                style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;border-top-left-radius: 25px;border-top-right-radius: 25px; margin: 10px;">
                <div class="card-body">
                    <h4 class="card-title">Boutique</h4>
                    <p class="card-text">Découvrez nos boutiques variées et captivantes ! Sélection soigneusement choisie de
                        marques renommées pour une expérience shopping unique. Service client exceptionnel, chaque visite
                        est une aventure !</p>
                </div>
                <div style="margin: 20px">
                    <button class="btn" style="background-color: #ffe0d2; color: #333333" type="button">Consulter</button>
                </div>
            </div>
            <div class="card scale"
                style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;border-top-left-radius: 25px;border-top-right-radius: 25px; margin: 10px;">
                <div class="card-body">
                    <h4 class="card-title">Services</h4>
                    <p class="card-text">"Découvrez nos services variés et professionnels ! Des solutions adaptées à vos
                        besoins, avec un service clientèle exceptionnel pour une expérience personnalisée. Explorez et
                        profitez d'un service de qualité dès aujourd'hui !</p>
                </div>
                <div style="margin: 20px">
                    <button class="btn" style="background-color: #ffe0d2; color: #333333" type="button">Consulter</button>
                </div>
            </div>
        </div>

        <section id="reservation" class="position-relative py-4 py-xl-5" style="background: var(--bs-body-bg); ">
            <div class="container position-relative">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text fw-bold m-0" style="color: black;">Réserver un vol</h6>
                    </div>
                    <div class="content-card">
                        <form action="vol/volsResult.php" method="get">
                            <br>
                            <table>
                                <thead>
                                    <tr>
                                        <th><label class="text-form" for="type">Type de Trajet</label></th>
                                        <th><label class="text-form" for="classe">Classe</label></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><select class="form-vol-select" name="type" id="type" required>
                                                <option value="ar">Aller - Retour</option>
                                                <option value="as">Aller Simple</option>
                                            </select></td>
                                        <td><select class="form-vol-select" name="classe" id="classe" required>
                                                <option>Economique</option>
                                                <option>Eco Premium</option>
                                                <option>Affaires</option>
                                                <option>Première</option>
                                            </select></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table>
                                <thead>
                                <tr>
                                    <th><label class="text-form" for="aller">Date D'Aller</label></th>
                                    <th><label class="text-form" for="retour">Date De Retour</label></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="date" name="aller" id="aller" required></td>
                                    <td><input type="date" name="retour" id="retour" required></td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <table>
                                <thead>
                                <tr>
                                    <th><label class="text-form" for="depart">Départ</label></th>
                                    <th><label class="text-form" for="destination">Arriver</label></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><select id="depart" name="depart" required>
                                            <?php
                                            foreach ($res as $aeroport) {
                                                ?>
                                                <option value="<?=$aeroport['id']?>"><?=$aeroport['ville'] . " - " . $aeroport['pays']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select></td>
                                    <td><select id="destination" name="destination" style="border-color: #ffe0d2" required>
                                            <?php
                                            foreach ($res as $aeroport) {
                                                ?>
                                                <option value="<?=$aeroport['id']?>"><?=$aeroport['ville'] . " - " . $aeroport['pays']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select></td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <label for="passager" class="text-form">Passagers</label>
                            <br>
                            <input id="passager" type="text" name="passager" required>
                            <br>
                            <br>
                            <button class="btn" style="background-color: #ffe0d2; color: #333333;" name="searchAR" type="submit">Rechercher</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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
                    <div
                        class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social">
                        <div class="fw-bold d-flex align-items-center mb-2"><span>Nuage Airport</span></div>
                        <p class="text-muted copyright">Le meilleur aéroport pour voyager en toute tranquillité.</p>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center pt-3">
                    <p class="mb-0">Copyright © 2024 - Nuage Airport</p>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a style="color: white" target="_blank"
                                href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a style="color: white" target="_blank"
                                href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a style="color: white" target="_blank" href="https://twitter.com/"><i
                                    class="fa-brands fa-x-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <nav class="navbar navbar-expand-md bg-body py-3"
        style="opacity: 98%; left: 0; top: 0; width: 100%; position: fixed; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25); border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; z-index: 1">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span
                    class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"></span>
                <span style="color: black;">Nuage Airport</span></a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"
                style="text-align: center"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span><i class="fa-solid fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" style="color: black;"
                            href="#reservation">Réservation</a></li>
                    <li class="nav-item"><a class="nav-link active" style="color: black;" href="#services">Services</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" style="color: black;"
                            href="#prochain">Prochain Départ</a></li>
                    <li class="nav-item">
                        <div class="dropdown" style="margin-top: -5px">
                            <a href="#"
                                class="d-flex align-items-center text-black text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="svg-snoweb svg-theme-light" height="50" preserveaspectratio="xMidYMid meet"
                                    viewbox="0 0 100 100" width="50" x="0" xmlns="http://www.w3.org/2000/svg" y="0">
                                    <path
                                        d="M60.67,19.826v60.35c-.55,.2-1.11,.38-1.67,.55-1.11,.32-2.25,.59-3.41,.79-1.82,.32-3.68,.49-5.59,.49-1.59,0-3.15-.12-4.67-.34-1.16-.17-2.3-.4-3.42-.69-.88-.23-1.74-.49-2.58-.79-.13-.05-.26-.09-.39-.15V19.966c.13-.06,.26-.1,.39-.15,.85-.3,1.71-.56,2.58-.79,1.12-.29,2.26-.52,3.42-.69,1.52-.22,3.08-.34,4.67-.34,1.91,0,3.77,.17,5.59,.49,1.16,.2,2.3,.47,3.41,.79,.57,.17,1.12,.35,1.67,.55Z"
                                        fill="#f4f4f4">
                                    </path>
                                    <path
                                        d="M82,49.996c0,2.19-.22,4.33-.64,6.4-.26,1.31-.61,2.58-1.03,3.83-.05,.15-.11,.31-.16,.47-.02,.04-.03,.09-.05,.14-.24,.67-.51,1.34-.8,1.99-.5,1.15-1.06,2.26-1.69,3.33-.91,1.56-1.95,3.02-3.09,4.39-3.65,4.35-8.42,7.71-13.87,9.63V19.826c5.82,2.05,10.86,5.74,14.58,10.51,.51,.65,.99,1.32,1.45,2.01,.68,1.03,1.31,2.11,1.87,3.23,.61,1.2,1.14,2.44,1.6,3.73,.11,.31,.22,.62,.32,.94,.09,.28,.17,.55,.25,.83,.36,1.24,.65,2.52,.85,3.83,.27,1.66,.41,3.36,.41,5.09Z"
                                        fill="#d80031">
                                    </path>
                                    <path
                                        d="M39.33,19.816v60.37c-.13-.05-.26-.09-.39-.15-5.14-1.89-9.65-5.06-13.17-9.13-.42-.48-.81-.97-1.2-1.47-.76-.99-1.46-2.03-2.1-3.11-.95-1.6-1.77-3.29-2.43-5.06l-.21-.57c-.06-.16-.11-.31-.16-.47-.42-1.25-.77-2.52-1.03-3.83-.42-2.07-.64-4.21-.64-6.4,0-1.73,.14-3.43,.41-5.09,.2-1.31,.49-2.59,.85-3.83,.12-.42,.25-.84,.39-1.26l.18-.51c.24-.7,.51-1.38,.81-2.06,.5-1.15,1.06-2.27,1.69-3.34,.81-1.39,1.72-2.71,2.72-3.95,3.6-4.48,8.4-7.97,13.89-9.99,.13-.06,.26-.1,.39-.15Z"
                                        fill="#323e95">
                                    </path>
                                </svg> Français
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light text-small"
                                style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-top-left-radius: 15px;border-top-right-radius: 15px;border: none;">
                                <li><a class="dropdown-item" href=""><svg class="svg-snoweb svg-theme-light" height="50"
                                            preserveaspectratio="xMidYMid meet" viewbox="0 0 100 100" width="50" x="0"
                                            xmlns="http://www.w3.org/2000/svg" y="0">
                                            <path
                                                d="M60.67,19.826v60.35c-.55,.2-1.11,.38-1.67,.55-1.11,.32-2.25,.59-3.41,.79-1.82,.32-3.68,.49-5.59,.49-1.59,0-3.15-.12-4.67-.34-1.16-.17-2.3-.4-3.42-.69-.88-.23-1.74-.49-2.58-.79-.13-.05-.26-.09-.39-.15V19.966c.13-.06,.26-.1,.39-.15,.85-.3,1.71-.56,2.58-.79,1.12-.29,2.26-.52,3.42-.69,1.52-.22,3.08-.34,4.67-.34,1.91,0,3.77,.17,5.59,.49,1.16,.2,2.3,.47,3.41,.79,.57,.17,1.12,.35,1.67,.55Z"
                                                fill="#f4f4f4">
                                            </path>
                                            <path
                                                d="M82,49.996c0,2.19-.22,4.33-.64,6.4-.26,1.31-.61,2.58-1.03,3.83-.05,.15-.11,.31-.16,.47-.02,.04-.03,.09-.05,.14-.24,.67-.51,1.34-.8,1.99-.5,1.15-1.06,2.26-1.69,3.33-.91,1.56-1.95,3.02-3.09,4.39-3.65,4.35-8.42,7.71-13.87,9.63V19.826c5.82,2.05,10.86,5.74,14.58,10.51,.51,.65,.99,1.32,1.45,2.01,.68,1.03,1.31,2.11,1.87,3.23,.61,1.2,1.14,2.44,1.6,3.73,.11,.31,.22,.62,.32,.94,.09,.28,.17,.55,.25,.83,.36,1.24,.65,2.52,.85,3.83,.27,1.66,.41,3.36,.41,5.09Z"
                                                fill="#d80031">
                                            </path>
                                            <path
                                                d="M39.33,19.816v60.37c-.13-.05-.26-.09-.39-.15-5.14-1.89-9.65-5.06-13.17-9.13-.42-.48-.81-.97-1.2-1.47-.76-.99-1.46-2.03-2.1-3.11-.95-1.6-1.77-3.29-2.43-5.06l-.21-.57c-.06-.16-.11-.31-.16-.47-.42-1.25-.77-2.52-1.03-3.83-.42-2.07-.64-4.21-.64-6.4,0-1.73,.14-3.43,.41-5.09,.2-1.31,.49-2.59,.85-3.83,.12-.42,.25-.84,.39-1.26l.18-.51c.24-.7,.51-1.38,.81-2.06,.5-1.15,1.06-2.27,1.69-3.34,.81-1.39,1.72-2.71,2.72-3.95,3.6-4.48,8.4-7.97,13.89-9.99,.13-.06,.26-.1,.39-.15Z"
                                                fill="#323e95">
                                            </path>
                                        </svg>Français</a></li>
                                <li><a class="dropdown-item" href="en/index.php"><svg class="svg-snoweb svg-theme-light"
                                            height="50" preserveaspectratio="xMidYMid meet" viewbox="0 0 100 100"
                                            width="50" x="0" xmlns="http://www.w3.org/2000/svg" y="0">
                                            <path
                                                d="M82,49.996c0,2.19-.22,4.33-.64,6.4-.26,1.31-.61,2.58-1.03,3.83-.07,.2-.14,.4-.21,.61-.24,.67-.51,1.34-.8,1.99-.5,1.15-1.06,2.26-1.69,3.33-.91,1.56-1.95,3.02-3.09,4.39-4.02,4.79-9.4,8.38-15.54,10.18-1.11,.32-2.25,.59-3.41,.79-1.82,.32-3.68,.49-5.59,.49-1.59,0-3.15-.12-4.67-.34-1.16-.17-2.3-.4-3.42-.69-6.37-1.66-11.96-5.23-16.14-10.07-.42-.48-.81-.97-1.2-1.47-.76-.99-1.46-2.03-2.1-3.11-.95-1.6-1.77-3.29-2.43-5.06-.13-.35-.26-.69-.37-1.04-.42-1.25-.77-2.52-1.03-3.83-.42-2.07-.64-4.21-.64-6.4,0-1.73,.14-3.43,.41-5.09,.2-1.31,.49-2.59,.85-3.83,.12-.42,.25-.84,.39-1.26,.29-.87,.62-1.73,.99-2.57,.5-1.15,1.06-2.27,1.69-3.34,.81-1.39,1.72-2.71,2.72-3.95,4.24-5.27,10.12-9.17,16.86-10.93,1.12-.29,2.26-.52,3.42-.69,1.52-.22,3.08-.34,4.67-.34,1.91,0,3.77,.17,5.59,.49,1.16,.2,2.3,.47,3.41,.79,6.52,1.91,12.18,5.84,16.25,11.06,.51,.65,.99,1.32,1.45,2.01,.68,1.03,1.31,2.11,1.87,3.23,.76,1.49,1.4,3.05,1.92,4.67,.09,.28,.17,.55,.25,.83,.36,1.24,.65,2.52,.85,3.83,.27,1.66,.41,3.36,.41,5.09Z"
                                                fill="#fff">
                                            </path>
                                            <path
                                                d="M78.57,35.576l-9.82,5.5h-7.64l15.59-8.73c.68,1.03,1.31,2.11,1.87,3.23Z"
                                                fill="#bd0034">
                                            </path>
                                            <path
                                                d="M79.32,62.826c-.5,1.15-1.06,2.26-1.69,3.33l-10.6-5.93h7.64l4.65,2.6Z"
                                                fill="#bd0034">
                                            </path>
                                            <path
                                                d="M35.09,41.076h-7.65l-6.8-3.83c.5-1.15,1.06-2.27,1.69-3.34l12.76,7.17Z"
                                                fill="#bd0034">
                                            </path>
                                            <path
                                                d="M41.01,60.226l-16.44,9.21c-.76-.99-1.46-2.03-2.1-3.11l10.89-6.1h7.65Z"
                                                fill="#bd0034">
                                            </path>
                                            <path d="M75.25,30.336l-16.25,9.1V19.276c6.52,1.91,12.18,5.84,16.25,11.06Z"
                                                fill="#1a237b">
                                            </path>
                                            <path d="M41.91,19.026v20.41l-16.86-9.48c4.24-5.27,10.12-9.17,16.86-10.93Z"
                                                fill="#1a237b">
                                            </path>
                                            <path d="M80.74,41.076h-6.834l5.973-2.856c.09,.28,.78,2.576,.86,2.856Z"
                                                fill="#1a237b">
                                            </path>
                                            <path d="M80.33,60.226c-.07,.2-.14,.4-.21,.61l-1.1-.61h1.31Z"
                                                fill="#1a237b">
                                            </path>
                                            <path d="M41.91,61.866v19.11c-6.37-1.66-11.96-5.23-16.14-10.07l16.14-9.04Z"
                                                fill="#1a237b">
                                            </path>
                                            <path d="M74.54,70.546c-4.02,4.79-9.4,8.38-15.54,10.18v-18.86l15.54,8.68Z"
                                                fill="#1a237b">
                                            </path>
                                            <path d="M21.89,41.076h-2.63c.12-.42,.25-.84,.39-1.26l2.24,1.26Z"
                                                fill="#1a237b">
                                            </path>
                                            <path
                                                d="M82,49.995c0,2.19-.22,4.33-.64,6.4h-25.77v25.12c-1.82,.32-3.68,.49-5.59,.49-1.59,0-3.15-.12-4.67-.34v-25.27H18.64c-.42-2.07-.64-4.21-.64-6.4,0-1.73,.14-3.43,.41-5.09h26.92V18.335c1.52-.22,3.08-.34,4.67-.34,1.91,0,3.77,.17,5.59,.49v26.42h26c.27,1.66,.41,3.36,.41,5.09Z"
                                                fill="#bd0034">
                                            </path>
                                            <path
                                                d="M82,49.996c0,2.19-.22,4.33-.64,6.4-.26,1.31-.61,2.58-1.03,3.83-.07,.2-.14,.4-.21,.61-.24,.67-.51,1.34-.8,1.99-.5,1.15-1.06,2.26-1.69,3.33-.91,1.56-1.95,3.02-3.09,4.39-4.02,4.79-9.4,8.38-15.54,10.18-1.11,.32-2.25,.59-3.41,.79-1.82,.32-3.68,.49-5.59,.49-1.59,0-3.15-.12-4.67-.34-1.16-.17-2.3-.4-3.42-.69-6.37-1.66-11.96-5.23-16.14-10.07-.42-.48-.81-.97-1.2-1.47-.76-.99-1.46-2.03-2.1-3.11-.95-1.6-1.77-3.29-2.43-5.06-.13-.35-.26-.69-.37-1.04-.42-1.25-.77-2.52-1.03-3.83-.42-2.07-.64-4.21-.64-6.4,0-1.73,.14-3.43,.41-5.09,.2-1.31,.49-2.59,.85-3.83,.12-.42,.25-.84,.39-1.26,.29-.87,.62-1.73,.99-2.57,.5-1.15,1.06-2.27,1.69-3.34,.81-1.39,1.72-2.71,2.72-3.95,4.24-5.27,10.12-9.17,16.86-10.93,1.12-.29,2.26-.52,3.42-.69,1.52-.22,3.08-.34,4.67-.34,1.91,0,3.77,.17,5.59,.49,1.16,.2,2.3,.47,3.41,.79,6.52,1.91,12.18,5.84,16.25,11.06,.51,.65,.99,1.32,1.45,2.01,.68,1.03,1.31,2.11,1.87,3.23,.76,1.49,1.4,3.05,1.92,4.67,.09,.28,.17,.55,.25,.83,.36,1.24,.65,2.52,.85,3.83,.27,1.66,.41,3.36,.41,5.09Z"
                                                fill="none">
                                            </path>
                                            <path d="M19.67,60.226h6.834l-5.973,2.856c-.09-.28-.78-2.576-.86-2.856Z"
                                                fill="#1a237b">
                                            </path>
                                        </svg>
                                        English
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown" style="padding-left: 10px; margin-top: 4px">
                            <a href="#"
                                class="d-flex align-items-center text-black text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/hdidogs.png" alt="" width="32" height="32"
                                    class="rounded-circle me-2">
                                <?php
                                if ($_SESSION['fonction'] == 4) {
                                    echo "Administrateur";
                                } else {
                                    echo $_SESSION['nom'] . " " . $_SESSION['prenom'];
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light text-small"
                                style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-top-left-radius: 15px;border-top-right-radius: 15px;border: none;">
                                <li><a class="dropdown-item" href="votreCompte.php">Votre Compte</a></li>
                                <?php
                                if ($_SESSION['fonction'] == 4) {
                                    ?>
                                    <li><a class="dropdown-item" href="panelAdministrateur.php">Panel Administration</a>
                                    </li>
                                    <?php
                                } else if ($_SESSION['fonction'] == 3) {
                                    ?>
                                    <li><a class="dropdown-item" href="panelCompagnie.php">Panel Compagnie</a></li>
                                    <?php
                                } else if ($_SESSION['fonction'] == 2) {
                                    ?>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#vacance">Vacances</a></li>
                                    <?php
                                }
                                ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="post" action="../src/controleur/TraitementUser.php">
                                        <button type="submit" class="dropdown-item"
                                            name="deconnexion">Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="vacance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pauser des Vacances</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../src/controleur/TraitementUser.php">
                    <div class="modal-body">
                        <table>
                            <thead>
                            <tr>
                                <th><label class="text-form" for="debut">Date de Début</label></th>
                                <th><label class="text-form" for="fin">Date de Fin</label></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="date" name="debut" id="debut" required></td>
                                <td><input type="date" name="fin" id="fin" required></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="pauser">Pauser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    $(document).ready( function () {
        $('#volList').DataTable();
    } );
    $('#destination').select2({
        selectOnClose: true
    });

    $('#depart').select2({
        selectOnClose: true
    });
</script>
</body>
</html>