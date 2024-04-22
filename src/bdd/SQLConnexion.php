<?php
class SQLConnexion
{
    private $bdd;
    private $serveur = "localhost";
    private $nomBdd = "projetaeroport";
    private $username = "root";
    private $password = "";


    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . $this->serveur . ';dbname=' . $this->nomBdd, $this->username, $this->password);
    }

<<<<<<< HEAD
    public function conbdd()
    {
        return $this->bdd;
=======
    public function conbdd(): PDO
    {
       return $this->bdd;
>>>>>>> 899f9faff6faf4df53ae2e1e5c7333ba698436c4
    }
}
?>