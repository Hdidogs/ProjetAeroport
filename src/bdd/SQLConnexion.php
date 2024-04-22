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
>>>>>>> c01952116be2a2ba427a42bd45ebe0631a5e5bf2
    }
}