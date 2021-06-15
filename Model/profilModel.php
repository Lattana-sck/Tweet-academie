<?php

require_once("../Model/bdd.php");

class profilModel extends myDatabase {

    public function showInfos($id) {

        $getid = intval($id);
        $rep = $this->_bdd->prepare('SELECT * FROM users WHERE user_id = ?');
        $rep->execute(array($getid));
        $userinfo = $rep->fetch();

        if(!$userinfo) {
            return false;
        }
        else if($userinfo) {
            $userinfo["user_id"];
            $userinfo["fullname"];
            $userinfo["birthdate"];
            $userinfo["phone"];
            $userinfo["email"];
            $userinfo['password'];
            $userinfo["picture"];
            $userinfo["banner"];
            $userinfo["biography"];
            $userinfo["username"];
            $userinfo["register_date"];
            return true;
        }
    }
}