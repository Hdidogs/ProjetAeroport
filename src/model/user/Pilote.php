<?php

class Pilote extends User {
    private $compagnie;
    private $fonction;

    public function __construct(array $info, $compagnie, $fonction) {
        parent::__construct($info);
        $this->compagnie = $compagnie;
        $this->fonction = $fonction;
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @param mixed $compagnie
     */
    public function setCompagnie($compagnie)
    {
        $this->compagnie = $compagnie;
    }

    /**
     * @return mixed
     */
    public function getCompagnie()
    {
        return $this->compagnie;
    }

    /**
     * @param mixed $fonction
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    /**
     * @return mixed
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    public function inscription() {
        $co = new SQLConnexion();
        $add_user = $co->conbdd()->prepare("INSERT INTO user (nom, prenom, mail, mdp, date, ville, fonction, ref_compagnie) VALUES (:nom, :prenom, :mail, :mdp, :date, :ville, :fonction, :ref_compagnie)");
        $add_user->execute(['nom'=>$this->getNom(), 'prenom'=>$this->getPrenom(), 'mail'=>$this->getMail(), 'mdp' =>$this->getMdp(), 'date'=>$this->getDate(), 'ville'=>$this->getVille(), 'fonction'=>$this->getFonction(), 'ref_compagnie'=>$this->getCompagnie()]);

        $id_user = $co->conbdd()->lastInsertId();

        if ($id_user) {
            session_start();

            $_SESSION['id_user'] = $id_user;
            $_SESSION['nom'] = $this->getNom();
            $_SESSION['prenom'] = $this->getPrenom();
            $_SESSION['mail'] = $this->getMail();
            $_SESSION['fonction'] = $this->getFonction();
            $_SESSION['compagnie'] = $this->getCompagnie();

            header("Location: ../../vue/index.php");
            return true;
        } else {
            header("Location: ../../vue/user/inscription.php");
            return false;
        }
    }
}