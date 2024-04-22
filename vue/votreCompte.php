<?php
// Inclure le fichier de connexion à la base de données
include '../src/bdd/SQLConnexion.php'; // Vérifiez et mettez à jour le chemin si nécessaire

session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VotreCompte</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container">
            <a class="navbar-brand" href="accueil.php">Aeroport de Paris</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="accueil.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="vols.php">Vols</a></li>
                    <li class="nav-item"><a class="nav-link" href="informations.php">Informations</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <span class="navbar-text actions">
                    <a class="btn btn-light action-button" role="button" href="votreCompte.php">Votre compte</a>
                    <a class="btn btn-light action-button" role="button" href="deconnexion.php">Deconnexion</a>
                </span>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_SESSION['id_user'])) {
        $id_utilisateur = $_SESSION['id_user'];

        // Utilisez la variable $sql_connexion du fichier SQLConnexion.php pour la connexion à la base de données
        global $sql_connexion;

        // Préparez et exécutez la requête SQL pour récupérer les informations de l'utilisateur
        $requete = "SELECT * FROM user WHERE id_user = $id_utilisateur";
        $resultat = $sql_connexion->query($requete);

        // Vérifiez si des résultats sont retournés
        if ($resultat->num_rows > 0) {
            // Affichez les informations de l'utilisateur
            echo '<div id="informations-personnelles">';
            echo '<h2>Informations personnelles</h2>';
            echo '<hr>';

            // Récupérez les données de l'utilisateur
            $utilisateur = $resultat->fetch_assoc();

            // Affichez les informations de l'utilisateur
            echo '<p>Nom: ' . $utilisateur['nom'] . ' ' . $utilisateur['prenom'] . '</p>';
            echo '<p>Email: ' . $utilisateur['mail'] . '</p>';
            echo '<p>Ville: ' . $utilisateur['ville'] . '</p>';

            // Vous pouvez ajouter d'autres champs ici selon votre structure de table
    
            echo '</div>';
        } else {
            echo '<p>Aucune information trouvée pour cet utilisateur.</p>';
        }
    } else {
        echo '<p>Vous n\'êtes pas connecté. Veuillez vous connecter pour voir vos informations personnelles.</p>';
    }
    ?>



</body>

</html>