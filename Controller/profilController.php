<?php

require_once("../Model/profilModel.php");

class profilController extends myDatabase {

    private $_profilModel;

    public function __construct() {
        $this->_profilModel = new profilModel;
    }

    public function showInfos($id) {
        $rep = $this->_profilModel->showInfos($id);

        if ($rep == false)
            echo "<p style='color:red;'>Cet id ne correspond pas à un utilisateur</p>";
        else if ($rep == true) {
        }
            // echo "<p> Fullname : " . $userinfo['fullname'] . "</p>";
            // echo "<p> Birthdate : " . $userinfo['birthdate'] . "</p>";
            // echo "<p> Pseudo : " . $userinfo['username'] . "</p>";
    }
}