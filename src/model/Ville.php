<?php
class Ville
{
    private $nomville;
    private $ref_pays;
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
    public function getNomVille()
    {
        return $this->nomville;
    }

    /**
     * @param mixed $nomville
     */
    public function setNomVille($nomville)
    {
        $this->nomville = $nomville;
    }

    /**
     * @return mixed
     */
    public function getRefPays()
    {
        return $this->ref_pays;
    }

    /**
     * @param mixed $ref_pays
     */
    public function setRefPays($ref_pays)
    {
        $this->ref_pays = $ref_pays;
    }

    public function insertVille($conn, $ref_pays = null)
    {
        $sql = "INSERT INTO ville (nom,ref_pays) VALUES (:nomville,:ref_pays)";
        $stmt = $conn->conbdd()->prepare($sql);
        $stmt->execute([
            'nomville' => $this->getNomVille(),
            'ref_pays' => $ref_pays
        ]);
    }

    public function updateVille($conn, $ref_pays)
    {
        $sql = "UPDATE ville SET nom = :nom, WHERE ref_pays = :ref_pays";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'nomville' => $this->getNomVille(),
            'ref_pays' => $ref_pays
        ]);
    }

    public function deleteVille($conn, $ref_pays)
    {
        $sql = "DELETE FROM ville WHERE ref_pays = :ref_pays";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'ref_pays' => $ref_pays
        ]);
    }
}