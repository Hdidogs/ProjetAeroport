<?php
class Compagnie
{
    private $nomCompagnie;
    private $numero;
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
    public function getNomCompagnie()
    {
        return $this->nomCompagnie;
    }

    /**
     * @param mixed $nomCompagnie
     */
    public function setNomCompagnie($nomCompagnie)
    {
        $this->nomCompagnie = $nomCompagnie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

public function insertCompagnie($conn)
    {
        $query = $conn->conbdd()->prepare("INSERT INTO compagnie (nom, numero) VALUES (:nom, :numero)");
        $query->execute(array(
            'nom' => $this->nomCompagnie,
            'numero' => $this->numero
        ));
    }

    public function updateCompagnie($conn,$id)
    {
        $query = $conn->conbdd()->prepare("UPDATE compagnie SET nom = :nom , numero = :numero WHERE id_companie = :id_companie");
        $query->execute(array(
            'nom' => $this->nomCompagnie,
            'numero' => $this->numero,
            'id_companie' => $id
        ));
    }

    public function deleteCompagnie($conn,$id)
    {
        $query = $conn->conbdd()->prepare("DELETE FROM vol WHERE ref_compagnie = :id_companie");
        $query->execute(array(
            'id_companie' => $id
        ));

        $query = $conn->conbdd()->prepare("DELETE FROM compagnie WHERE id_companie = :id_companie");
        $query->execute(array(
            'id_companie' => $id
        ));
    }
}