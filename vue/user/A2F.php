<!DOCTYPE html>
<html>

<head>
    <title>Double Authentification</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/A2Fcss.css">
</head>

<body>

    <div id="php">
        <?php
        include '../../src/bdd/SQLConnexion.php';
        include '../../src/model/Mail.php';

        if (isset($_POST['verification_code'])) {
            if ($_POST['verification_code'] == $_SESSION['verification_code']) {
                $_SESSION['A2F'] = true;
                header("Location: ../index.php");
            } else {
                // Le code de vérification est incorrect, afficher un message d'erreur
                $error = "Code de vérification incorrect";
            }
        } else {
            $verification_code = rand(100000, 999999);

            $_SESSION['verification_code'] = $verification_code;

            Mail::SENDMAIL($_SESSION['mail'], 'Votre code de vérification', 'Votre code de vérification est : ' . $verification_code);
        }

        ?>
    </div>

    <h1>Double Authentification</h1>

    <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label for="number">A2F Code :</label>
        <input type="number" minlength="6" maxlength="6" pattern="[0-9]+" id="verification_code"
            name="verification_code" required><br>
        <a href="../connexion.php" class="btn">Retour</a>
        <input type="submit" value="Se connecter" class="btn">
    </form>
    <script>
        const php = document.getElementById("php")
        php.style.display = "none";
    </script>
</body>

</html>