<?php
require_once('../Model/bdd.php');

class inscriptionModel extends myDatabase
{   
    public function createUser($fullname, $birthdate, $number, $email, $password, $username)
    {    
        // ajout d'un SALT
        $salt = "vive le projet tweet_academy";
        $password_salted = $salt . $password;
        $password_hashed = hash('ripemd160', $password_salted);
        
        $req_email = $this->_bdd->prepare('SELECT email FROM users WHERE email = ?');
        $req_email->execute(array($email));
        $data = $req_email->fetch();

        $req_num = $this->_bdd->prepare('SELECT phone FROM users WHERE phone = ?');
        $req_num->execute(array($number));
        $data1 = $req_num->fetch();

        $req_username = $this->_bdd->prepare('SELECT username FROM users WHERE username = ?');
        $req_username->execute(array($username));
        $data2 = $req_username->fetch();

        // Verif de l'age de l'utilisateur
        $date = date("Y-m-d");
        $comparaison = date_diff(date_create($birthdate), date_create($date));

        if($comparaison->format('%y') < 18)
            {
                echo "<p style='color:red;'>Inscription interdite aux moins de 18ans</p>";
                die();
            }

        else if($data)
            {
                echo "<p style='color:red;'>Cet email est déjà utilisé.</p>";
                die();
            }
        else if($data1)
            {
               echo "<p style='color:red;'>Ce numéro de téléphone est déja utilisé.</p>"; 
               die();
            }
        else if($data2)
            {
                echo "<p style='color:red;'>Ce pseudo est déja utilisé.</p>";
                die();
            }
        // Insertion dans la BDD
        if($this->_bdd->query("INSERT INTO users (fullname, birthdate, phone, email, password, username) 
                                    VALUES ('$fullname', '$birthdate', '$number', '$email', '$password_hashed', '$username')"))
            return true;
        return false;
    } 
}
