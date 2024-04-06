<?php
include "../bdd/SQLConnexion.php";
$conn = new SQLConnexion();

if (isset($_POST['new_password'])) {
    $new_password = $_POST['new_password'];
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    $id_user = $_SESSION['id_user'];
    $req = $conn->conbdd()->prepare("UPDATE user SET mdp = :new_password WHERE id_user = :id_user");
    $req->execute(['new_password' => $new_password, 'id_user' => $id_user]);
    header("Location: ../../vue/connexion.php");
}