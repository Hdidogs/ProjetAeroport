<?php
// Inclure le fichier de connexion à la base de données
include '../src/bdd/SQLConnexion.php'; // Vérifiez et mettez à jour le chemin si nécessaire

session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: connexion.php');
    exit();
}

// Récupérer la liste des utilisateurs depuis la base de données
$requete_users = "SELECT * FROM user";
$res_users = mysqli_query($sql_connexion, $requete_users);
// Traitement de la modification de l'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    // Ajoutez d'autres champs ici selon votre structure de table

    // Mettre à jour les données de l'utilisateur dans la base de données
    $requete_update = "UPDATE user SET nom='$nom', prenom='$prenom' WHERE id_user=$id_user";
    if ($sql_connexion->query($requete_update) === TRUE) {
        echo "Les données de l'utilisateur ont été mises à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour des données de l'utilisateur : " . $sql_connexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Liste des utilisateurs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultat_users->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_user']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><?php echo $row['mail']; ?></td>
                        <td><?php echo $row['ville']; ?></td>
                        <td>
                            <!-- Bouton pour ouvrir la fenêtre modale -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modifierModal<?php echo $row['id_user']; ?>">
                                Modifier
                            </button>
                        </td>
                    </tr>

                    <!-- Fenêtre modale pour modifier les données de l'utilisateur -->
                    <div class="modal fade" id="modifierModal<?php echo $row['id_user']; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier les données de l'utilisateur
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulaire de modification des données de l'utilisateur -->
                                    <form action="" method="POST">
                                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                                        <div class="form-group">
                                            <label for="nom">Nom:</label>
                                            <input type="text" class="form-control" id="nom" name="nom"
                                                value="<?php echo $row['nom']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Prénom:</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom"
                                                value="<?php echo $row['prenom']; ?>">
                                        </div>
                                        <!-- Ajoutez d'autres champs ici -->
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>