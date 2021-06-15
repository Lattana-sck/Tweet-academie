<?php

require_once("../Model/bdd.php");

class followersModel extends myDatabase {

    public function showFollowers() {
        $req = $this->_bdd->query('SELECT * FROM users INNER JOIN follows ON users.user_id = follows.follower_id WHERE follows.user_id = '.$_SESSION['user_id'].'');
            echo "<h3>Voici la liste de vos followers :</h3>";
        while($data = $req->fetch()){
            echo "<div class='followers'>" . "<a href='../View/profil.php?id=" . $data['follower_id'] . "'>" . $data['fullname'] . "</a><br>" . "@" .$data['username'] . "</div>";
        }
        echo "<br><a href='profil.php?id=" . $_SESSION['user_id'] . "'>Retourner sur votre profil</a>";
        if($req)
            return true;
        return false;
    }
}
