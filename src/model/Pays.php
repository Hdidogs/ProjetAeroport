<?php
class Pays
{
    private $nomPays;
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
    public function getNomPays()
    {
        return $this->nomPays;
    }

    /**
     * @param mixed $nomPays
     */
    public function setNomPays($nomPays)
    {
        $this->nomPays = $nomPays;
    }
    public function insertPays($conn)
    {
        $sql = "INSERT INTO pays (nom) VALUES (:nom)";
        $stmt = $conn->conbdd()->prepare($sql);
        $stmt->execute([
            ':nom' => $this->getNomPays(),
        ]);
    }

    public function updatePays($conn, $ref_pays)
    {
        $sql = "UPDATE pays SET nomPays = :nomPays WHERE ref_pays = :ref_pays";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nomPays' => $this->getNomPays(),
            ':ref_pays' => $ref_pays
        ]);
    }

    public function deletePays($conn , $ref_pays)
    {
        $sql = "DELETE FROM pays WHERE ref_pays = :ref_pays";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':ref_pays' => $ref_pays
        ]);
    }
}