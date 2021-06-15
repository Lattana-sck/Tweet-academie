<?php

require_once("../Model/messagerieModel.php");

class messagerieController extends myDatabase {

    private $_messagerieModel;

    public function __construct() {
        $this->_messagerieModel = new messagerieModel;
    }
    
    public function getDest() {
        $rep = $this->_messagerieModel->getDest();

        if($rep == false)
            echo "marche pas";
        else if ($rep == true)
            echo "marche";
    }
    // public function getDestId($destinataire){
    //     $rep = $this->_messagerieModel->getDestId($destinataire);

    //     if ($rep == false)
    //         echo "marche pas getdesid";
    //     else if ($rep == true)
    //         echo "marche getid";
    // }

    public function sendMessage($message, $destinataire) {
        $rep = $this->_messagerieModel->sendMessage($message, $destinataire);
        
        if ($rep == false)
            echo "<p style='color:red;'>Le message n'a pas été envoyé !</p>";
        else if ($rep == true)
            echo "<p style='color:green;'> Message envoyé !</p>";
    }

    public function receiveMessage(){
        $rep = $this->_messagerieModel->receiveMessage();

        if ($rep == false){}
        else if ($rep == true){}
    }

}