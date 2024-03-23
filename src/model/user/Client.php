<?php

class Client extends User {
    public function __construct(array $info) {
        parent::__construct($info);
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function inscription() {
        $co = new SQLConnexion();
        $add_user = $co->conbdd()->prepare("INSERT INTO user (nom, prenom, mail, mdp, date, ville) VALUES (:nom, :prenom, :mail, :mdp, :date, :ville)");
        $add_user->execute(['nom' => $this->getNom(), 'prenom' => $this->getPrenom(), 'mail' => $this->getMail(), 'mdp' => $this->getMdp(), 'date' => $this->getDate(), 'ville' => $this->getVille()]);

        $id_user = $co->conbdd()->lastInsertId();

        if ($id_user) {
            session_start();

            $_SESSION['id_user'] = $id_user;
            $_SESSION['nom'] = $this->getNom();
            $_SESSION['prenom'] = $this->getPrenom();
            $_SESSION['mail'] = $this->getMail();
            $_SESSION['fonction'] = "client";

            header("Location: ../../vue/index.php");
            return true;
        } else {
            header("Location: ../../vue/user/ConnexionInscription.php");
            return false;
        }
    }
}