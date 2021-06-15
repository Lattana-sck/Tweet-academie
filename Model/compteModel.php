<?php

require_once("../Model/bdd.php");

class compteModel extends myDatabase {

    public function tweet($tweet){
            $session = $_SESSION['user_id'];
            if($this->_bdd->query("INSERT INTO tweets (user_id, content) 
                                    VALUES ('$session', '$tweet')")){
                return true;
                }
            else{
                return false;}
    }

    public function showTweet(){
        $req = $this->_bdd->query('SELECT users.fullname 
                                        AS fullnameFollowing, users.username 
                                        AS usernameFollowing, tweets.content 
                                        AS tweetContentFollowing, users.picture 
                                        AS pictureFollowing, users.user_id 
                                        AS idFollowing, tweets.tweet_date 
                                        AS twit
                                        FROM tweets 
                                        JOIN follows 
                                        ON tweets.user_id = follows.user_id 
                                        JOIN users 
                                        ON follows.user_id = users.user_id 
                                        WHERE follows.follower_id = '. $_SESSION['user_id'] .'
                                        UNION SELECT users.fullname, users.username, tweets.content, users.picture, users.user_id, tweets.tweet_date
                                        FROM users JOIN tweets ON users.user_id = tweets.user_id WHERE users.user_id = '. $_SESSION['user_id'].' 
                                        ORDER BY twit DESC');
        while($data = $req->fetch()){
            echo "<div class='tweet'>" . $data['fullnameFollowing'] . " @" . $data['usernameFollowing'] . "<br>" . $data['twit'] . "<br>" . $data['tweetContentFollowing'] . "</div>" . "<br>";
        }
        return true;
    return false;
    }
}