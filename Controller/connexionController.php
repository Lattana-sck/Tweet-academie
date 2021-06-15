<?php

require_once("../Model/connexionModel.php");

class connexionController extends myDatabase {

    private $_connexionModel;

    public function __construct() {
        $this->_connexionModel = new connexionModel;
    }

    public function connectUser($login, $password) {
        $rep = $this->_connexionModel->connectUser($login, $password);
        
        if ($rep == false)
            echo "<p style='color:red;'>Les identifiants utilisés sont incorrects !</p>";
        else if ($rep == true)
            header('Location: ../View/profil.php?id='.$_SESSION['user_id']);
    }
}