<?php

require_once("../Model/bdd.php");

class connexionModel extends myDatabase {

    public function connectUser($login, $password) {

        $req = $this->_bdd->prepare('SELECT * FROM users WHERE username = ? OR phone = ? OR email = ?');
        $req->execute(array($login, $login, $login));
        $donnees = $req->fetch();

        $salt = "vive le projet tweet_academy";
        $password_salted = $salt . $password;
        $password_hashed = hash('ripemd160', $password_salted);

        

        if (!$donnees) {
            return false;
        }

        else {
            if ($password_hashed == $donnees['password']) {
                session_start();
                $_SESSION["user_id"] = $donnees["user_id"];
                $_SESSION["fullname"] = $donnees["fullname"];
                $_SESSION["birthdate"] = $donnees["birthdate"];
                $_SESSION["phone"] = $donnees["phone"];
                $_SESSION["email"] = $donnees["email"];
                $_SESSION['password'] = $donnees['password'];
                $_SESSION["picture"] = $donnees["picture"];
                $_SESSION["banner"] = $donnees["banner"];
                $_SESSION["biography"] = $donnees["biography"];
                $_SESSION["username"] = $donnees["username"];
                $_SESSION["register_date"] = $donnees["register_date"];
                $_SESSION["idSession"] = session_id();
                return true;
            }
            else {
                return false;
            }
        }
    }
}