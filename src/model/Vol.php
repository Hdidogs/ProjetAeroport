<?php

include "../bdd/SQLConnexion.php";

class Vol
{
    private $id;
    private $destination;
    private $date;
    private $company;
    private $allerRetour;
    private $depart;
    private $arrivee;
    private $billet;
    private $nombreBillet;

    function __construct(array $info)
    {
        $this->hydrate($info);
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getAllerRetour()
    {
        return $this->allerRetour;
    }

    /**
     * @param mixed $allerRetour
     */
    public function setAllerRetour($allerRetour)
    {
        $this->allerRetour = $allerRetour;
    }

    /**
     * @return mixed
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * @param mixed $depart
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }

    /**
     * @return mixed
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }

    /**
     * @param mixed $arrivee
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;
    }

    /**
     * @return mixed
     */
    public function getBillet()
    {
        return $this->billet;
    }

    /**
     * @param mixed $billet
     */
    public function setBillet($billet)
    {
        $this->billet = $billet;
    }

    /**
     * @return mixed
     */
    public function getNombreBillet()
    {
        return $this->nombreBillet;
    }

    /**
     * @param mixed $nombreBillet
     */
    public function setNombreBillet($nombreBillet)
    {
        $this->nombreBillet = $nombreBillet;
    }

    public function addVol()
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('INSERT INTO vol(destination, date, company, allerRetour, depart, arrivee, billet, nombreBillet) VALUES(:destination, :date, :company, :allerRetour, :depart, :arrivee, :billet, :nombreBillet)');
        $req->execute(array(
            'destination' => $this->destination,
            'date' => $this->date,
            'company' => $this->company,
            'allerRetour' => $this->allerRetour,
            'depart' => $this->depart,
            'arrivee' => $this->arrivee,
            'billet' => $this->billet,
            'nombreBillet' => $this->nombreBillet
        ));
    }

    public static function getVols()
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->query('SELECT * FROM vol');
        return $req->fetchAll();
    }

    public static function getVol($id)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('SELECT * FROM vol WHERE id = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public static function supprimerVol($id)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('DELETE FROM vol WHERE id = :id');
        $req->execute(array('id' => $id));
    }

    public static function modifierVol($id, $depart, $arrivee, $billet, $nombreBillet)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('UPDATE vol SET depart = :depart, arrivee = :arrivee, billet = :billet, nombreBillet = :nombreBillet WHERE id_vol = :id');
        $req->execute(array(
            'depart' => $depart,
            'arrivee' => $arrivee,
            'billet' => $billet,
            'nombreBillet' => $nombreBillet,
            'id' => $id
        ));
    }


    public static function ajouterVol(string $depart, string $arrivee, string $billet, string $nombreBillet)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('INSERT INTO vol(depart, arrivee, billet, nombreBillet) VALUES(:depart, :arrivee, :billet, :nombreBillet)');
        $req->execute(array(
            'depart' => $depart,
            'arrivee' => $arrivee,
            'billet' => $billet,
            'nombreBillet' => $nombreBillet
        ));
    }

    public static function reserveVol($id_user, $id_vol, $nb)
    {
        $bdd = new SQLConnexion();
        $req = $bdd->conbdd()->prepare('INSERT INTO uservol (ref_user, ref_vol, nbr_billet) VALUES (:user, :vol, :nb)');
        $req->execute(array(
            'user' => $id_user,
            'vol' => $id_vol,
            'nb' => $nb,
        ));
    }
}
?>
