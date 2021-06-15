<?php

require_once("../Model/bdd.php");

class followingModel extends myDatabase {

    public function showFollowing() {
        $req = $this->_bdd->query('SELECT * FROM users INNER JOIN follows ON users.user_id = follows.user_id WHERE follows.follower_id ='.$_SESSION['user_id'].'');
            echo "<h3>Voici la liste de vos following :</h3>";
        while($data = $req->fetch()){
            echo "<div class='following'>" . "<a href='../View/profil.php?id=" . $data['user_id'] . "'>" . $data['fullname'] . "</a><br>" . "@" .$data['username'] . "</div>";
        }
        echo "<br><a href='profil.php?id=" . $_SESSION['user_id'] . "'>Retourner sur votre profil</a>";
        if($req)
            return true;
        return false;

    }
}