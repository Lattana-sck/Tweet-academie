<?php

require_once("../Model/bdd.php");

class settingsModel extends myDatabase {

    public function changePassword($actualpwd, $newpwd, $confirmnewpwd) {

        $salt = "vive le projet tweet_academy";
        $password_salted = $salt . $actualpwd;
        $password_hashed = hash('ripemd160', $password_salted);
        $newpwd_salted = $salt . $newpwd;
        $newpwd_hashed = hash('ripemd160', $newpwd_salted);
        $id = $_SESSION["id_user"];
        
        if ($newpwd == $confirmnewpwd AND $password_hashed == $_SESSION["password"]) {
            $req = $this->_bdd->query("UPDATE users SET password = '$newpwd_hashed' WHERE user_id = '$id'");
            return true;
        }
        else {
            return false;
        }
    }

    public function changeMail($newmail) {

        $actualmail = $_SESSION["email"];
        $req = $this->_bdd->prepare('SELECT email FROM users WHERE email = ?');
        $req->execute(array($newmail));
        $donnees = $req->fetch();

        if ($donnees) {
            echo "<p style='color:red;'>Cette adresse mail est déjà utilisée</p>";
            return false;
        }

        else if($this->_bdd->query("UPDATE users SET email = '$newmail' WHERE email = '$actualmail'"))
            return true;
        return false;
    }

    public function changePseudo($newpseudo) {

        $actualpseudo = $_SESSION["username"];
        $req = $this->_bdd->prepare('SELECT username FROM users WHERE username = ?');
        $req->execute(array($newpseudo));
        $donnees = $req->fetch();

        if ($donnees) {
            echo "<p style='color:red;'>Ce pseudo est déjà utilisé</p>";
            return false;
        }

        else if($this->_bdd->query("UPDATE users SET username = '$newpseudo' WHERE username = '$actualpseudo'"))
            return true;
        return false;
    }

    public function changeNumber($newnumber) {

        $actualnumber = $_SESSION["phone"];
        $req = $this->_bdd->prepare('SELECT phone FROM users WHERE phone = ?');
        $req->execute(array($newnumber));
        $donnees = $req->fetch();

        if ($donnees) {
            echo "<p style='color:red;'>Ce numéro de téléphone est déjà utilisé</p>";
            return false;
        }

        else if($this->_bdd->query("UPDATE users SET phone = '$newnumber' WHERE phone = '$actualnumber'"))
            return true;
        return false;
    }
    public function changeAvatar($avatar){

        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
            $tailleMax = 2097152;
            $extensionValides = array('jpg', 'jpeg', 'gif', 'png');
            
            if($_FILES['avatar']['size'] <= $tailleMax){
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionValides)){
                    $chemin = "../avatar/" . $_SESSION['user_id'] . "." . $extensionUpload;
                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                    if($resultat){
                        $req = $this->_bdd->prepare(' UPDATE users SET picture = ? WHERE user_id = ? ');
                        $req->execute(array($chemin, $_SESSION['user_id']));
                        return true;
                    }
                    
                    else{
                        echo "Erreur durant l'importation de votre photo de profil.";
                        return false;
                    }
                }
                else{
                    echo "Votre photo de profil doit etre au forrmat JPG, JPEG, GIF ou PNG";
                    return false;
                }
            }
            else{
                echo  "Votre photo de profil ne doit pas dépasser 2Mo.";
                return false;
            }
        }
    }
    public function changeBanner($banner){

        if(isset($_FILES['banner']) AND !empty($_FILES['banner']['name'])){
            $tailleMax = 2097152;
            $extensionValides = array('jpg', 'jpeg', 'gif', 'png');
            
            if($_FILES['banner']['size'] <= $tailleMax){
                $extensionUpload = strtolower(substr(strrchr($_FILES['banner']['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionValides)){
                    $chemin = "../banner/" . $_SESSION['user_id'] . "." . $extensionUpload;
                    $resultat = move_uploaded_file($_FILES['banner']['tmp_name'], $chemin);
                    if($resultat){
                        $req = $this->_bdd->prepare(' UPDATE users SET banner = ? WHERE user_id = ? ');
                        $req->execute(array($chemin, $_SESSION['user_id']));
                        return true;
                    }
                    
                    else{
                        echo "Erreur durant l'importation de votre bannière.";
                        return false;
                    }
                }
                else{
                    echo "Votre bannière doit etre au forrmat JPG, JPEG, GIF ou PNG";
                    return false;
                }
            }
            else{
                echo  "Votre bannière ne doit pas dépasser 2Mo.";
                return false;
            }
        }
    }
}