<?php

include "../../bdd/SQLConnexion.php";

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
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('INSERT INTO vol(destination, date, company, allerRetour, depart, arrivee, billet, nombreBillet) VALUES(:destination, :date, :company, :allerRetour, :depart, :arrivee, :billet, :nombreBillet)');
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
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->query('SELECT * FROM vol');
        return $req->fetchAll();
    }

    public static function getVol($id)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE id = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public static function supprimerVol($id)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('DELETE FROM vol WHERE id = :id');
        $req->execute(array('id' => $id));
    }

    public static function mettreAJourVol($id, $destination, $date, $company, $allerRetour, $depart, $arrivee, $billet, $nombreBillet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('UPDATE vol SET destination = :destination, date = :date, company = :company, allerRetour = :allerRetour, depart = :depart, arrivee = :arrivee, billet = :billet, nombreBillet = :nombreBillet WHERE id = :id');
        $req->execute(array(
            'destination' => $destination,
            'date' => $date,
            'company' => $company,
            'allerRetour' => $allerRetour,
            'depart' => $depart,
            'arrivee' => $arrivee,
            'billet' => $billet,
            'nombreBillet' => $nombreBillet,
            'id' => $id
        ));
    }

    public static function ajoutVol($destination, $date, $company, $allerRetour, $depart, $arrivee, $billet, $nombreBillet, $id)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('INSERT INTO vol (destination, date, company, allerRetour, depart, arrivee, billet, nombreBillet, id) VALUES (:destination, :date, :company, :allerRetour, :depart, :arrivee, :billet, :nombreBillet, :id)');
        $req->execute(array(
            'destination' => $destination,
            'date' => $date,
            'company' => $company,
            'allerRetour' => $allerRetour,
            'depart' => $depart,
            'arrivee' => $arrivee,
            'billet' => $billet,
            'nombreBillet' => $nombreBillet,
            'id' => $id
        ));
    }

    public static function getVolsParDestination($destination)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination');
        $req->execute(array('destination' => $destination));
        return $req->fetchAll();
    }

    public static function getVolsParDate($date)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE date = :date');
        $req->execute(array('date' => $date));
        return $req->fetchAll();
    }

    public static function getVolsParCompagnie($company)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE company = :company');
        $req->execute(array('company' => $company));
        return $req->fetchAll();
    }

    public static function getVolsParAllerRetour($allerRetour)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE allerRetour = :allerRetour');
        $req->execute(array('allerRetour' => $allerRetour));
        return $req->fetchAll();
    }

    public static function getVolsParDepart($depart)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE depart = :depart');
        $req->execute(array('depart' => $depart));
        return $req->fetchAll();
    }

    public static function getVolsParArrivee($arrivee)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE arrivee = :arrivee');
        $req->execute(array('arrivee' => $arrivee));
        return $req->fetchAll();
    }

    public static function getVolsParBillet($billet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE billet = :billet');
        $req->execute(array('billet' => $billet));
        return $req->fetchAll();
    }

    public static function getVolsParNombreBillet($nombreBillet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE nombreBillet = :nombreBillet');
        $req->execute(array('nombreBillet' => $nombreBillet));
        return $req->fetchAll();
    }

    public static function getVolsParDestinationEtDate($destination, $date)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination AND date = :date');
        $req->execute(array('destination' => $destination, 'date' => $date));
        return $req->fetchAll();
    }

    public static function getVolsParDestinationEtCompagnie($destination, $company)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination AND company = :company');
        $req->execute(array('destination' => $destination, 'company' => $company));
        return $req->fetchAll();
    }

    public static function getVolsParDestinationEtAllerRetour($destination, $allerRetour)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination AND allerRetour = :allerRetour');
        $req->execute(array('destination' => $destination, 'allerRetour' => $allerRetour));
        return $req->fetchAll();
    }

    public static function getVolsParDestinationEtDepart($destination, $depart)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination AND depart = :depart');
        $req->execute(array('destination' => $destination, 'depart' => $depart));
        return $req->fetchAll();
    }

    public static function getVolsParDestinationEtArrivee($destination, $arrivee)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination AND arrivee = :arrivee');
        $req->execute(array('destination' => $destination, 'arrivee' => $arrivee));
        return $req->fetchAll();
    }

    public static function getVolsParDestinationEtBillet($destination, $billet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination AND billet = :billet');
        $req->execute(array('destination' => $destination, 'billet' => $billet));
        return $req->fetchAll();
    }

    public static function getVolsParDestinationEtNombreBillet($destination, $nombreBillet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE destination = :destination AND nombreBillet = :nombreBillet');
        $req->execute(array('destination' => $destination, 'nombreBillet' => $nombreBillet));
        return $req->fetchAll();
    }

    public static function getVolsParDateEtCompagnie($date, $company)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE date = :date AND company = :company');
        $req->execute(array('date' => $date, 'company' => $company));
        return $req->fetchAll();
    }

    public static function getVolsParDateEtAllerRetour($date, $allerRetour)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE date = :date AND allerRetour = :allerRetour');
        $req->execute(array('date' => $date, 'allerRetour' => $allerRetour));
        return $req->fetchAll();
    }

    public static function getVolsParDateEtDepart($date, $depart)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE date = :date AND depart = :depart');
        $req->execute(array('date' => $date, 'depart' => $depart));
        return $req->fetchAll();
    }

    public static function getVolsParDateEtArrivee($date, $arrivee)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE date = :date AND arrivee = :arrivee');
        $req->execute(array('date' => $date, 'arrivee' => $arrivee));
        return $req->fetchAll();
    }

    public static function getVolsParDateEtBillet($date, $billet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE date = :date AND billet = :billet');
        $req->execute(array('date' => $date, 'billet' => $billet));
        return $req->fetchAll();
    }

    public static function getVolsParDateEtNombreBillet($date, $nombreBillet)
    {x
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE date = :date AND nombreBillet = :nombreBillet');
        $req->execute(array('date' => $date, 'nombreBillet' => $nombreBillet));
        return $req->fetchAll();
    }

    public static function getVolsParCompagnieEtAllerRetour($company, $allerRetour)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE company = :company AND allerRetour = :allerRetour');
        $req->execute(array('company' => $company, 'allerRetour' => $allerRetour));
        return $req->fetchAll();
    }

    public static function getVolsParCompagnieEtDepart($company, $depart)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE company = :company AND depart = :depart');
        $req->execute(array('company' => $company, 'depart' => $depart));
        return $req->fetchAll();
    }

    public static function getVolsParCompagnieEtArrivee($company, $arrivee)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE company = :company AND arrivee = :arrivee');
        $req->execute(array('company' => $company, 'arrivee' => $arrivee));
        return $req->fetchAll();
    }

    public static function getVolsParCompagnieEtBillet($company, $billet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE company = :company AND billet = :billet');
        $req->execute(array('company' => $company, 'billet' => $billet));
        return $req->fetchAll();
    }

    public static function getVolsParCompagnieEtNombreBillet($company, $nombreBillet)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE company = :company AND nombreBillet = :nombreBillet');
        $req->execute(array('company' => $company, 'nombreBillet' => $nombreBillet));
        return $req->fetchAll();
    }

    public static function getVolsParAllerRetourEtDepart($allerRetour, $depart)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE allerRetour = :allerRetour AND depart = :depart');
        $req->execute(array('allerRetour' => $allerRetour, 'depart' => $depart));
        return $req->fetchAll();
    }

    public static function getVolsParAllerRetourEtArrivee($allerRetour, $arrivee)
    {
        $bdd = SQLConnexion::getInstance();
        $req = $bdd->prepare('SELECT * FROM vol WHERE allerRetour = :allerRetour AND arrivee = :arrivee');
        $req->execute(array('allerRetour' => $allerRetour, 'arrivee' => $arrivee));
        return $req->fetchAll();
    }
}

?>
