<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VotreCompte</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="offcanvas offcanvas-start bg-body" tabindex="-1" data-bs-backdrop="false" id="offcanvas-menu">
        <div class="offcanvas-header"><a class="link-body-emphasis d-flex align-items-center me-md-auto mb-3 mb-md-0 text-decoration-none" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bootstrap-fill me-3" style="font-size: 25px;">
                    <path d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                    <path d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396z"></path>
                </svg><span class="fs-4">ProjetAeroport</span></a><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button></div>
        <div class="offcanvas-body d-flex flex-column justify-content-between pt-0">
            <div>
                <hr class="mt-0">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item"><a class="nav-link active link-light" href="#" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house-door me-2">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"></path>
                            </svg>Accueil :</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis" href="#informations-personnelles"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person me-2">
                                <path fill-rule="evenodd" d="M8 1.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM1.5 8a6.5 6.5 0 1 1 13 0 6.5 6.5 0 0 1-13 0z" clip-rule="evenodd"></path>
                                <path d="M0 15s1-.5 3-.5 3 .5 3 .5-2-.5-3-.5-3 .5-3 .5z"></path>
                            </svg>Informations Personnelles</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis" href="#reservations"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar-check me-2">
                                <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"></path>
                                <path fill-rule="evenodd" d="M13.5 5.5a.5.5 0 0 1 0 1h-10a.5.5 0 0 1 0-1h10zm0 3a.5.5 0 0 1 0 1h-10a.5.5 0 0 1 0-1h10zm-3-2a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h7zm3 3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1h3zm-6.854-4.354a.5.5 0 0 1 .708 0l1.646 1.646a.5.5 0 0 1-.708.708L8.5 6.707 6.207 4.414a.5.5 0 0 1 .708-.708l1.646 1.646zM10.5 9a.5.5 0 0 1 0-1h2a.5.5 0 0 1 0 1h-2z"></path>
                            </svg>Réservations de Vols</a></li>
                    <li class="nav-item"><a class="nav-link link-body-emphasis" href="#historique"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-journal me-2">
                                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v11.793a.5.5 0 0 1-.854.354L12.5 12.5H3a.5.5 0 0 1-.5-.5V1.5zm1 0V11h10V2H2z"></path>
                                <path d="M.5 0A.5.5 0 0 1 1 .5v14a.5.5 0 0 1-.5.5A.5.5 0 0 1 0 15V.5A.5.5 0 0 1 .5 0zM1 1v13H13V1H1z"></path>
                            </svg>Historique des Vols</a></li>
                </ul>
            </div>
            <div id="informations-personnelles">
                <hr>
                <!-- Formulaire pour modifier les informations personnelles -->
                <h5>Modifier les Informations Personnelles</h5>
                <form>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" class="form-control" id="nom" placeholder="Votre nom">
                    </div>
                    <!-- Ajoutez des champs pour d'autres informations personnelles ici -->
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
            <div id="reservations">
                <hr>
                <!-- Affichage des réservations de vols -->
                <h5>Mes Réservations de Vols</h5>
                <!-- Ajoutez ici du code pour afficher les réservations -->
            </div>
            <div id="historique">
                <hr>
                <!-- Affichage de l'historique des vols -->
                <h5>Historique des Vols</h5>
                <!-- Ajoutez ici du code pour afficher l'historique des vols -->
            </div>
            <hr>
            <div class="dropdown">
                <a class="dropdown-toggle link-body-emphasis d-flex" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Déconnexion
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <!-- Ajoutez ici des options pour la déconnexion -->
                    <li><a class="dropdown-item" href="#">Se Déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
