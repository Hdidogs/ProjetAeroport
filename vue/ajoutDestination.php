<?php
include "../src/bdd/SQLConnexion.php";
//session_start();
$conn = new SQLConnexion();
//if (isset($_SESSION['id_user'])){
//   $id_user = $_SESSION['id_user'];
//}else{
//    header("Location: ../user/Connexion.php");
//}

$req = $conn->conbdd()->query("SELECT * FROM destination");
$ajoutDestination =$req->fetchAll();
$req = $conn->conbdd()->query("SELECT * FROM pays");
$ajoutpays =$req->fetchAll();
$req = $conn->conbdd()->query(("SELECT * FROM ville"));
$ajoutville = $req->fetchAll();
?>
<html>
<body>
<form method="post" action="../src/controleur/TraitementDestination.php">
<br>
<input type="text" name="nomAeroport" placeholder="Aeroport" required>
    <br>
    <select name="pays" id="py">
        <option>Pays<?php foreach ($ajoutpays as $pays): ?>
        <option value="<?php echo $pays['id_pays']; ?>"><?php echo $pays['nom']; ?></option>
        <?php endforeach;?>
    </select>
    <br>
    <select name="ville" id="vil">
        <option>Ville<?php foreach ($ajoutville as $ville): ?>
        <option value="<?php echo $ville['id_ville']; ?>"><?php echo $ville['nom']; ?></option>
        <?php endforeach;?>
    </select>
    <br>
    <button type="button" id="btnpays">+</button>
    <button type="button" id="btnville">+</button>
    <div id="pays">
    <input type="text" name="nompays" placeholder="Pays">
    </div>
    <div id="ville">
        <input type="text" name="nomville" placeholder="Ville">
    </div>
    <br>
    <button type="submit">Envoyer</button>
</form>
<script>
    let btnpays = document.getElementById("btnpays");
    let btnville = document.getElementById("btnville");
    let pays = document.getElementById("pays");
    let ville = document.getElementById("ville");

    pays.style.display = "none";
    ville.style.display = "none";

    btnpays.addEventListener("click", () => {
        if(getComputedStyle(pays).display != "block"){
            pays.style.display = "block";
        } else {
            pays.style.display = "none";
        }
    })
    btnville.addEventListener("click", () => {
        if(getComputedStyle(ville).display != "block"){
            ville.style.display = "block";
        } else {
            ville.style.display = "none";
        }
    })
</script>
</body>
</html>