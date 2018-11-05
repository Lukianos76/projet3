<?php

class UserManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet3;charset=utf8", "root", "");
    }

    public function create($values)
    {
        $bdd = $this->bdd;

        $password_hash = password_hash($values['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO projet3_users (pseudo, password, email, register_date) VALUES (:pseudo, :password, :email, CURRENT_TIMESTAMP)";

        $req = $bdd->prepare($query);

        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);
        $req->bindValue(':password', $password_hash);
        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);

        $req->execute();

    }

    public function login($values)
    {
        $bdd = $this->bdd;

        $query = "SELECT id, pseudo, password, email, register_date, administrator FROM projet3_users WHERE pseudo = :pseudo";

        $req = $bdd->prepare($query);
        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);


        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setPassword($row['password']);
        $user->setEmail($row['email']);
        $user->setRegisterDate($row['register_date']);
        $user->setAdministrator($row['administrator']);

        session_start();
        $_SESSION['id']              = $user->getId();
        $_SESSION['pseudo']          = $user->getPseudo();
        $_SESSION['email']           = $user->getEmail();
        $_SESSION['register_date']   = $user->getRegisterDate();
        $_SESSION['administrator']   = $user->getAdministrator();

    }

    public function checkRegister($values)
    {

        $bdd = $this->bdd;

        $errorMessage = NULL;

        // VERIFICATION IF PSEUDO EXIST
        $query = "SELECT pseudo FROM projet3_users WHERE pseudo = :pseudo";

        $req = $bdd->prepare($query);

        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);

        $req->execute();
        $checkPseudo = $req->fetch();

        if ($checkPseudo)
        {
            $errorMessage = $errorMessage."Le pseudo existe déjà<br>";
        }

        // VERIFICATION IF EMAIL EXIST
        $query = "SELECT email FROM projet3_users WHERE email = :email";

        $req = $bdd->prepare($query);

        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);

        $req->execute();
        $checkEmail = $req->fetch();
        if ($checkEmail)
        {
            $errorMessage = $errorMessage."L'email existe déjà<br>";
        }

        return $errorMessage;
    }

    public function checkLogin($values)
    {
        $bdd = $this->bdd;

        $errorMessage = NULL;

        // VERIFICATION IF PSEUDO EXIST
        $query = "SELECT pseudo, password FROM projet3_users WHERE pseudo = :pseudo";

        $req = $bdd->prepare($query);

        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);

        $req->execute();
        $checkLogin = $req->fetch();

        $isPasswordCorrect = password_verify($values['password'], $checkLogin['password']);

        if (!$checkLogin)
        {
            $errorMessage = $errorMessage."L'identifiant n'existe pas<br>";
        }
        if (!$isPasswordCorrect) {
            $errorMessage = $errorMessage . "Le mot de passe n'est pas valide<br>";
        }

        return $errorMessage;
    }



}