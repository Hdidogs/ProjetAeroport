<?php

abstract class User
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $date;
    private $ville;

    function __construct(array $info) {
        $this->hydrate($info);
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
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
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public static function CONNEXION($mail, $mdp) {
        $conn = new SQLConnexion();
        $res = $conn->conbdd()->prepare("SELECT * FROM user WHERE mail = :mail");
        $res->execute(['mail'=>$mail]);
        $user = $res -> fetch();

        $id = $user['id_user'];
        $usermdp = $user['mdp'];
        $usernom = $user['nom'];
        $userprenom = $user['prenom'];
        $usermail = $user['mail'];

        if (password_verify($mdp, $usermdp)) {
            session_start();

            $_SESSION['id_user'] = $id;
            $_SESSION['nom'] = $usernom;
            $_SESSION['prenom'] = $userprenom;
            $_SESSION['mail'] = $usermail;

            header("Location: ../../html/index.php");
            return true;
        } else {
            header("Location: ../../html/connexion.html");
            return false;
        }
    }

    public static function CHECKIFMAILEXIST($mail): bool {
        $conn = new SQLConnexion();

        $check_mail = $conn->conbdd()->prepare("SELECT mail FROM user WHERE mail = :mail");
        $check_mail->execute(['mail'=>$mail]);

        $mail = $check_mail->fetchAll();

        if ($mail != null) {
            return true;
        } else {
            return false;
        }
    }
}