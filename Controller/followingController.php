<?php
require_once("../Model/followingModel.php");

class followingController extends myDatabase {

    private $_followingModel;

    public function __construct() {
        $this->_followingModel = new followingModel;
    }

    public function showFollowing() {

        $rep = $this->_followingModel->showFollowing();

        if ($rep == false)
            echo "<p style='color:red;'>Aucun abonnement</p>";
        else if ($rep == true){}
    }
}
?>