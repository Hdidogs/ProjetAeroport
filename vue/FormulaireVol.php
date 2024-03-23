<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/formulaireVol.css" />
    <title>Formulaire de Vol</title>
</head>
<body>
    <div class="reservation-box">
        <h2>Formulaire de Vol</h2>

        <?php
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les valeurs des champs
            $destination = $_POST["destination"];
            $date = $_POST["date"];
            $company = $_POST["company"];
            $allerRetour = $_POST["allerRetour"];
            $depart = $_POST["depart"];
            $arrivee = $_POST["arrivee"];
            $billet = $_POST["billet"];
            $nombreBillet = $_POST["nombreBillet"];

            // Faire quelque chose avec les valeurs récupérées
            // les afficher
            echo "Destination: " . $destination . "<br>";
            echo "Date: " . $date . "<br>";
            echo "Company: " . $company . "<br>";
            echo "Aller/Retour: " . $allerRetour . "<br>";
            echo "Départ: " . $depart . "<br>";
            echo "Arrivée: " . $arrivee . "<br>";
            echo "Billet: " . $billet . "<br>";
            echo "Nombre de billets: " . $nombreBillet . "<br>";

            // Récupérer le prix en fonction du type de billet
            $prix = getPrixByBillet($billet);

            echo "Prix: " . $prix . "<br>";
        }

        // Fonction pour récupérer le prix en fonction du type de billet
        function getPrixByBillet($billet) {
            // Faire la requête à la base de données pour récupérer le prix
            // en fonction du nom du billet
            // ...
            // Retourner le prix récupéré
            return $prix;
        }
        ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <label for="destination">Destination:</label>
            <select name="destination" id="destination" required>
                <option value="Paris">Paris</option>
                <option value="New York">New York</option>
                <option value="Tokyo">Tokyo</option>
            </select><br>

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required><br>

            <label for="company">Company:</label>
            <select name="company" id="company" required>
                <option value="Company A">Company A</option>
                <option value="Company B">Company B</option>
                <option value="Company C">Company C</option>
            </select><br>

            <label for="allerRetour">Aller/Retour:</label>
            <input type="checkbox" name="allerRetour" id="allerRetour"><br>

            <label for="depart">Départ:</label>
            <select name="depart" id="depart">
                <option value="Paris">Paris</option>
                <option value="New York">New York</option>
                <option value="Tokyo">Tokyo</option>
            </select><br>

            <label for="arrivee">Arrivée:</label>
            <select name="arrivee" id="arrivee">
                <option value="Paris">Paris</option>
                <option value="New York">New York</option>
                <option value="Tokyo">Tokyo</option>
            </select><br>

            <label for="billet">Billet:</label>
            <select name="billet" id="billet">
                <option value="économique">Économique</option>
                <option value="premier classe">Premier Classe</option>
                <option value="business">Business</option>
            </select><br>

            <label for="nombreBillet">Nombre de billets:</label>
            <input type="number" name="nombreBillet" id="nombreBillet" min="1" value="1" required>
            <button type="button" onclick="increaseBillet()">+</button>
            <button type="button" onclick="decreaseBillet()">-</button><br>
            <br>

            <input type="submit" value="Soumettre">
        </form>
    </div>

    <script>
        function increaseBillet() {
            var input = document.getElementById("nombreBillet");
            input.value = parseInt(input.value) + 1;
        }

        function decreaseBillet() {
            var input = document.getElementById("nombreBillet");
            var value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        }
    </script>
</body>
</html>
