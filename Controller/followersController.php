<?php
require_once("../Model/followersModel.php");

class followersController extends myDatabase {

    private $_followersModel;

    public function __construct() {
        $this->_followersModel = new followersModel;
    }

    public function showFollowers() {

        $rep = $this->_followersModel->showFollowers();

        if ($rep == false)
            echo "<p style='color:red;'>Aucun abonné(e)s</p>";
        else if ($rep == true){}
    }
}
?>