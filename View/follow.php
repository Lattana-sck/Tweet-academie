<?php

session_start();
$bdd = new PDO("mysql:host=localhost;dbname=tweetacademie;charset=UTF8", "root" , "root");

    $getfollowedid = intval($_GET['followedid']);

    if($getfollowedid != $_SESSION['user_id']) {
        $alreadyfollowed = $bdd->prepare('SELECT * FROM follows WHERE follower_id = ? AND user_id = ?');
        $alreadyfollowed->execute(array($_SESSION['user_id'], $getfollowedid));
        $alreadyfollowed = $alreadyfollowed->rowCount();

        if($alreadyfollowed == 0) {
            $addfollow = $bdd->prepare('INSERT INTO follows (follower_id, user_id) VALUES (?, ?)');
            $addfollow->execute(array($_SESSION['user_id'], $getfollowedid));
        }
        else if($alreadyfollowed == 1) {
            $deletefollow = $bdd->prepare('DELETE FROM follows WHERE follower_id = ? AND user_id = ?');
            $deletefollow->execute(array($_SESSION['user_id'], $getfollowedid));
        }
    }
    header('Location:'.$_SERVER['HTTP_REFERER']);
?>