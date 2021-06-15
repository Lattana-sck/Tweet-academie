<?php

require_once("../Model/bdd.php");

class messagerieModel extends myDatabase {

    public function getDest(){
        $getDest = $this->_bdd->query('SELECT username 
                                            FROM users 
                                            INNER JOIN follows 
                                            ON users.user_id = follows.user_id 
                                            WHERE follower_id = '.$_SESSION['user_id'].' ');
        while($data = $getDest->fetch()){
            echo "<option>" . $data['username'] . "</option>";
        }    
    }

    // public function getDestId($destinataire){
        
    //         return true;
    //     return false;
    // }

    public function sendMessage($message, $destinataire){
        if($getDestId = $this->_bdd->query('SELECT user_id FROM users WHERE username = "'.$destinataire.'" '))
        while($data = $getDestId->fetch()){
            $id = $data['user_id'];
        }

        $req = $this->_bdd->prepare('INSERT INTO messages (user_id, receiver_id, content) 
                                    VALUES (?, ?, ?)');
        $req->execute(array($_SESSION['user_id'], $id, $message));
        if($req)
            return true;
        return false;
    }
    public function receiveMessage(){
        $receiveMessage = $this->_bdd->query('SELECT fullname, content, message_date 
                                                FROM messages 
                                                INNER JOIN users 
                                                ON messages.user_id = users.user_id 
                                                WHERE messages.receiver_id = '. $_SESSION['user_id'] .'');
        while($data = $receiveMessage->fetch()){
            echo "<div class='msgRecu'><p>" . $data['fullname'] . " vous a envoyé un msg :<br><br> " . $data['content'] . "<br><br> à " . $data['message_date'] . "</p></div><br>";
        }
        if($receiveMessage)
            return true;
        return false;
    }
}
?>
