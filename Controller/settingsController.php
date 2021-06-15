<?php

require_once("../Model/settingsModel.php");

class settingsController extends myDatabase {

    private $_settingsModel;

    public function __construct() {
        $this->_settingsModel = new settingsModel;
    }

    public function changePassword($actualpwd, $newpwd, $confirmnewpwd) {

        $rep = $this->_settingsModel->changePassword($actualpwd, $newpwd, $confirmnewpwd);

        if ($rep == false)
            echo "<p style='color:red;'>Le mot de passe n'a pas pu être modifié</p>";
        else if ($rep == true)
            echo "<p style='color:green;'>Le mot de passe a bien été modifié</p>";
    }

    public function changeMail($newmail) {

        $rep = $this->_settingsModel->changeMail($newmail);

        if ($rep == false)
            echo "<p style='color:red;'>L'adresse mail n'a pas pu être modifiée</p>";
        else if ($rep == true)
            echo "<p style='color:green;'>L'adresse mail a bien été modifiée</p>";
    }

    public function changePseudo($newpseudo) {

        $rep = $this->_settingsModel->changePseudo($newpseudo);

        if ($rep == false)
            echo "<p style='color:red;'>Le pseudo n'a pas pu être modifié</p>";
        else if ($rep == true)
            echo "<p style='color:green;'>Le pseudo a bien été modifié</p>";
    }

    public function changeNumber($newnumber) {

        $rep = $this->_settingsModel->changeNumber($newnumber);

        if ($rep == false)
            echo "<p style='color:red;'>Le numéro de téléphone n'a pas pu être modifié</p>";
        else if ($rep == true)
            echo "<p style='color:green;'>Le numéro de téléphone a bien été modifié</p>";
    }

    public function changeAvatar($avatar){

        $rep = $this->_settingsModel->changeAvatar($avatar);

        if($rep == false)
            echo "<p style='color:red;'>Votre photo de profil n'a pas pu être modifiée.</p>";
        
        else if($rep == true)
            echo "<p style='color:green;'>Votre photo de profil a été modifiée.</p>";
    }
    public function changeBanner($banner){

        $rep = $this->_settingsModel->changeBanner($banner);

        if($rep == false)
            echo "<p style='color:red;'>Votre bannière n'a pas pu être modifiée.</p>";
        
        else if($rep == true)
            echo "<p style='color:green;'>Votre bannière a été modifiée.</p>";
    }
}