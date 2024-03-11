<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion Inscription</title>
    <link rel="stylesheet" href="../../assets/css/styleConnexionInscription.css">
</head>
<body>
<div class="connexion">
    <form method="post" action="../../src/controleur/TraitementUser.php">
        <div class="container" id="container">
            <div class="right-panel-active" id="right-panel-active">
                <div class="form-container sign-up-container">
                    <h1>Crée un compte</h1>
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prenom">
                    <input type="text" name="ville" placeholder="Ville">
                    <input type="date" name="date" placeholder="Date de Naissance">
                    <input type="email" name="mail" placeholder="Adresse Mail">
                    <input type="password" name="mdp" placeholder="Mot de Passe">
                    <input type="password" name="remdp" placeholder="Confirmer Mot de Passe">
                    <button type="submit" name="inscriptionclient">Inscription</button>
                </div>
            </div>

            <div class="left-panel-active" id="left-panel-active">
                <div class="form-container sign-in-container">
                    <h1>Connexion</h1>
                    <input type="email" name="mail" placeholder="Adresse Mail" />
                    <input type="password" name="mdp" placeholder="Mot De Passe" />
                    <div class="mdpConnexion">
                        <a href="MotdePasseOubliee.php">Mot de passe oublié ?</a>
                        <br>
                        <br>
                        <button type="submit" name="connexion">Connexion</button>
                    </div>
                </div>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Vous êtes de retour ?</h1>
                        <p>Cliquez ici pour vous connecter</p>
                        <button type="button" class="ghost" id="signIn">Connexion</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Vous êtes nouveaux ?</h1>
                        <p>Cliquez ici pour nous rejoindre !</p>
                        <button type="button" class="ghost" id="signUp">Inscription</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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