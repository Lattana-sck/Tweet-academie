<?php

require_once("../Model/compteModel.php");

class compteController extends myDatabase {

    private $_compteModel;

    public function __construct() {
        $this->_compteModel = new compteModel;
    }

    public function tweet($tweet) {
        $rep = $this->_compteModel->tweet($tweet);
        
        if ($rep == false)
            echo "<p style='color:red;'>marche pas !</p>";
        else if ($rep == true);
    }

    public function showTweet(){
        $rep = $this->_compteModel->showTweet();
        if ($rep == false)
            echo "<p style='color:red;'>marche pas !</p>";
        else if ($rep == true);
            
    }
}