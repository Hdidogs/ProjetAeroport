<?php

class Destination
{
    private $nomAeroport;
    private $ref_ville;
    public function __construct(array $info)
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
    public function getNomAeroport()
    {
        return $this->nomAeroport;
    }

    /**
     * @param mixed $nomAeroport
     */
    public function setNomAeroport($nomAeroport)
    {
        $this->nomAeroport = $nomAeroport;
    }

    /**
     * @return mixed
     */
    public function getRefville()
    {
        return $this->ref_ville;
    }

    /**
     * @param mixed $ref_ville
     */
    public function setRefville($ref_ville)
    {
        $this->ref_ville = $ref_ville;
    }

    public function insertDestination($conn , $ref_ville)
    {

        $query = $conn->conbdd()->prepare("INSERT INTO destination (nom_aeroport, ref_ville) VALUES (:nomAeroport, :ville)");
        $query->execute(array(
            'nomAeroport' => $this->nomAeroport,
            'ville' => $ref_ville
        ));
    }

    public function updateDestination($conn, $id)
    {
        // Mettre à jour la table destination
        $query = $conn->conbdd()->prepare("UPDATE destination SET nom_aeroport = :nom_aeroport WHERE id_destination = :id_destination");
        $query->execute(array(
            'nom_aeroport' => $this->getNomAeroport(),
            'id_destination' => $id
        ));
    }
    public function deleteDestination($conn , $ref_ville)
    {
        // Supprimer de la table destination
        $query = $conn->conbdd()->prepare("DELETE FROM destination WHERE ref_ville = :ville");
        $query->execute(array(
            'ville' => $ref_ville
        ));
    }

    public function getDestination($conn, $ref_ville)
    {
        $query = $conn->conbdd()->prepare("SELECT * FROM destination WHERE ref_ville = :ville");
        $query->execute(array(
            'ville' => $ref_ville
        ));
        return $query->fetch();
    }


    public function getAllDestinations($conn)
    {
        $query = $conn->conbdd()->prepare("SELECT * FROM destination");
        $query->execute();
        return $query->fetchAll();
    }

}