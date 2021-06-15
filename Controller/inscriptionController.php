<?php

require_once('../Model/inscriptionModel.php');

class inscriptionController {
    private $_inscriptionModel;

    public function __construct(){
        $this->_inscriptionModel = new inscriptionModel();    
    }
    
    public function createUser($fullname, $birthdate, $number, $email, $password, $username){
        $requete = $this->_inscriptionModel->createUser($fullname, $birthdate, $number, $email, $password, $username);
        if ($requete == false){
            echo "<p style='color:red;'>Inscription n'a pas été effectuée.</p>";    
        }
        else if ($requete == true){
            echo "Inscription effectuée.";
        }
    }
}
?>