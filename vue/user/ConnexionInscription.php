<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion Inscription</title>
    <link rel="stylesheet" href="../../assets/css/styleConnexionInscription.css">
</head>
<body>
<div class="connexion">
    <div class="container" id="container">
        <div class="right-panel-active" id="right-panel-active">
            <div class="form-container sign-up-container">
                <form method="post" action="../../src/controleur/TraitementUser.php">
                    <h1>Crée un compte</h1>
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="text" name="prenom" placeholder="Prenom" required>
                    <input type="text" name="ville" placeholder="Ville" required>
                    <input type="date" name="date" placeholder="Date de Naissance" required>
                    <input type="email" name="mail" placeholder="Adresse Mail" required>
                    <input type="password" name="mdp" placeholder="Mot de Passe" required>
                    <input type="password" name="remdp" placeholder="Confirmer Mot de Passe" required>
                    <button type="submit" name="inscriptionclient">Inscription</button>
                </form>
            </div>
        </div>

        <div class="left-panel-active" id="left-panel-active">
            <div class="form-container sign-in-container">
                <form method="post" action="../../src/controleur/TraitementUser.php">
                    <h1>Connexion</h1>
                    <input type="email" name="mail" placeholder="Adresse Mail" required/>
                    <input type="password" name="mdp" placeholder="Mot De Passe" required/>
                    <div class="mdpConnexion">
                        <a href="MotdePasseOubliee.php">Mot de passe oublié ?</a>
                        <br>
                        <br>
                        <button type="submit" name="connexion">Connexion</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Vous êtes de retour ?</h2>
                    <p>Cliquez ici pour vous connecter</p>
                    <button type="button" class="ghost" id="signIn">Connexion</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h2>Vous êtes nouveaux ?</h2>
                    <p>Cliquez ici pour nous rejoindre !</p>
                    <button type="button" class="ghost" id="signUp">Inscription</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    const rightPanel = document.getElementById('right-panel-active');
    const leftPanel = document.getElementById('left-panel-active');

    signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
    rightPanel.style.display = "block";
    setTimeout(() => {
        leftPanel.style.display = "none";
    }, 250);
    });

    signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
    leftPanel.style.display = "block";
    setTimeout(() => {
        rightPanel.style.display = "none";
    }, 250);
    });
</script>
</body>
</html>