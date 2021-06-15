<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../skeleton.css">
    <title>Messagerie</title>
</head>
<body>
    <header>
    <nav class="vertical_menu">
            <a href="../View/compte.php"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Home</a>
            <a href="#"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Recherche #</a>
            <a href="#"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Notifications</a>
            <a href="../View/messagerie.php"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Messagerie</a>
            <a href="../View/profil.php?id=<?= $_SESSION['user_id']; ?>"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Profil</a>
            <a href="../View/settings.php"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Settings</a>
        </nav>
        <div id="messagerie" style="width: 500px">
        <h3> Messagerie </h3>
        <form method="POST" action="#">
                <select id ="destinataire" name="destinataire">
                    <option>Destinataires</option>
                    <?php
                    require_once('../Controller/messagerieController.php');
                    $messagerie = new messagerieController();
                    $messagerie->getDest();
                    ?>
                </select>
                <textarea style="resize: none" rows="10" cols="50" placeholder="Votre message..." name="message"></textarea><br>
                <input type="submit" value="Envoyer" class="envoyer">
            </form>
                    <?php

                    if(isset($_POST['destinataire']) AND isset($_POST['message']) AND !empty($_POST['message'])){
                        // $destUserId = $messagerie->getDestId($_POST['destinataire']);
                        $messagerie->sendMessage($_POST['message'], $_POST['destinataire']);
                    }
                        $messagerie->receiveMessage();
                    ?>
        </div>
        <section>
            <article>
                <input type="text" name="recherche" placeholder="recherche Twitter">
                <input type="submit" value="rechercher">
            </article>
            <article>
                <p>HASHTAG TENDANCES</p>
            </article>
        </section>
    </header>

</body>
</html>
<?php
?>