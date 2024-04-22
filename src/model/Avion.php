<?php

class Avion
{
    private $id;
    private $nom;
    private $capacite;
    private $compagnie;

    public function __construct($id, $nom, $capacite, $compagnie)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->capacite = $capacite;
        $this->compagnie = $compagnie;
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public static function modifierAvion($id, $nom, $compagnie, $capacite)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('UPDATE avion SET nom = :nom, compagnie = :compagnie, capacite = :capacite WHERE id_avion = :id');
        $req->execute(array(
            'nom' => $nom,
            'compagnie' => $compagnie,
            'capacite' => $capacite,
            'id' => $id
        ));
    }

    public static function supprimerAvion($id)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('DELETE FROM avion WHERE id_avion = :id');
        $req->execute(array(
            'id' => $id
        ));
    }

    public static function ajouterAvion($nom, $compagnie, $capacite)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('INSERT INTO avion(nom, compagnie, capacite) VALUES(:nom, :compagnie, :capacite)');
        $req->execute(array(
            'nom' => $nom,
            'compagnie' => $compagnie,
            'capacite' => $capacite
        ));
    }
}