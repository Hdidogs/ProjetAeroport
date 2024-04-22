<?php
abstract class User
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    private $date;
    private $ville;

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
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
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

    public static function CONNEXION($mail, $mdp)
    {
        $conn = new SQLConnexion();

        if ($mail == "root") {

            $res = $conn->conbdd()->prepare("SELECT * FROM user WHERE ville = :mail");
            $res->execute(['mail' => $mail]);
            $user = $res->fetch();

            if ($user != null) {
                $id = $user['id_user'];
                $usermdp = $user['mdp'];
                $usernom = $user['nom'];
                $userprenom = $user['prenom'];
                $usermail = $user['mail'];
                $fonction = $user['ref_fonction'];

                if (password_verify($mdp, $usermdp)) {
                    session_start();

                    $_SESSION['id_user'] = $id;
                    $_SESSION['nom'] = $usernom;
                    $_SESSION['prenom'] = $userprenom;
                    $_SESSION['mail'] = $usermail;
                    $_SESSION['fonction'] = $fonction;
                    $_SESSION['compagnie'] = $user['ref_compagnie'];

                    header("Location: ../../vue/index.php");
                    return true;
                } else {
                    header("Location: ../../vue/connexion.php");
                    return false;
                }
            } else {
                header("Location: ../../vue/connexion.php");
                return false;
            }
        } else {
            $res = $conn->conbdd()->prepare("SELECT * FROM user WHERE mail = :mail");
            $res->execute(['mail' => $mail]);
            $user = $res->fetch();

            if ($user != null) {
                $id = $user['id_user'];
                $usermdp = $user['mdp'];
                $usernom = $user['nom'];
                $userprenom = $user['prenom'];
                $usermail = $user['mail'];
                $fonction = $user['ref_fonction'];

                if (password_verify($mdp, $usermdp)) {
                    session_start();

                    $_SESSION['id_user'] = $id;
                    $_SESSION['nom'] = $usernom;
                    $_SESSION['prenom'] = $userprenom;
                    $_SESSION['mail'] = $usermail;
                    $_SESSION['fonction'] = $fonction;
                    $_SESSION['compagnie'] = $user['ref_compagnie'];

                    header("Location: ../../vue/index.php");
                    return true;
                } else {
                    header("Location: ../../vue/connexion.php");
                    return false;
                }
            } else {
                header("Location: ../../vue/connexion.php");
                return false;
            }
        }
    }

    public static function CHECKIFMAILEXIST($mail): bool
    {
        $conn = new SQLConnexion();

        $check_mail = $conn->conbdd()->prepare("SELECT mail FROM user WHERE mail = :mail");
        $check_mail->execute(['mail' => $mail]);

        $mail = $check_mail->fetchAll();

        if ($mail != null) {
            return true;
        } else {
            return false;
        }
    }

    public static function ModifierUser($id, $nom, $prenom, $mail, $mdp, $ville)
    {
        $conn = new SQLConnexion();

        $mdp = password_hash($mdp, PASSWORD_DEFAULT);

        $res = $conn->conbdd()->prepare("UPDATE user SET nom = :nom, prenom = :prenom, mail = :mail, mdp = :mdp, ville = :ville WHERE id_user = :id");
        $res->execute(['nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'mdp' => $mdp, 'ville' => $ville, 'id' => $id]);

        header("Location: ../../vue/votreCompte.php");
    }

    public static function SupprimerUser($id, $nom, $prenom, $mail, $mdp, $ville)
    {
        $conn = new SQLConnexion();

        $res = $conn->conbdd()->prepare("DELETE FROM user WHERE id_user = :id");
        $res->execute(['id' => $id]);

        session_start();
        session_destroy();

        header("Location: ../../vue/index.php");
    }
}