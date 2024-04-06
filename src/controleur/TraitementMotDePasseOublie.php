<?php
include '../../src/bdd/SQLConnexion.php';
include '../../src/model/user/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $emailExists = User::CHECKIFMAILEXIST($email);
    if ($emailExists) {
        echo "Email est valide.";
    } else {
        echo "Email n'est pas valide.";
    }
    header("location : ../vue/user/UpdateMdp.php");
}
