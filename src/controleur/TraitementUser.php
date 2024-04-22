<?php
include "../bdd/SQLConnexion.php";
include "../model/user/User.php";
include "../model/user/Client.php";

if (array_key_exists("connexion", $_POST)) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    User::CONNEXION($mail, $mdp);
} else if (array_key_exists("inscriptionclient", $_POST)) {
    /*if ($_POST['mdp'] == $_POST['remdp'])*/ {
        $newmdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);

        $prenom = strtolower($_POST['prenom']);
        $user = new Client([
            "nom" => strtoupper($_POST['nom']),
            "prenom" => ucfirst($prenom),
            "date" => $_POST['date'],
            "mail" => $_POST['mail'],
            "mdp" => $newmdp,
            "ville" => $_POST['ville'],
        ]);

        if (User::CHECKIFMAILEXIST($_POST['mail'])) {
            header("Location: ../../vue/connexion.php");
        } else {
            $user->inscription();
        }
    }
} else if (array_key_exists("pauser", $_POST)) {
    $conn = new SQLConnexion();
    session_start();

    $req = $conn->conbdd()->prepare("INSERT INTO `conge`(`date_debut`, `date_fin`, `ref_user`) VALUES (:dated, :datef, :user)");
    $req->execute(['dated'=>$_POST['debut'], 'datef'=>$_POST['fin'],'user'=>$_SESSION['id_user']]);

    header("Location: ../../vue/index.php");
} else if (array_key_exists("deconnexion", $_POST)) {
    session_start();
    session_destroy();

    header("Location: ../../vue/connexion.php");
}
?>
