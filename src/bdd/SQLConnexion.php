
<?php


class SQLConnexion{
    private $bdd;
    private $serveur = "localhost" ;
    private $nomBdd = "projetaeroport" ;
    private $username = "root";
    private $password = "";


    public function __construct() {
        $this->bdd =  new PDO('mysql:host='.$this->serveur.';dbname='.$this->nomBdd, $this->username, $this->password);
    }

    public function bdd(){
       return $this->bdd;
    }

}