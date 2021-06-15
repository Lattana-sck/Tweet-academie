<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../skeleton.css">
    <title>Mon Compte</title>
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
        <div class="twitter">
            <form method="POST" action="#">
                <textarea maxlength="140" style="resize: none" rows="10" cols="50" placeholder="Ca dit quoi ?" name="tweet"></textarea><br>
                <input type="submit" value="tweet" class="tweet_button">
            </form>
            <div class="twitted">
            <?php
                require_once('../Controller/compteController.php');
                $controller = new compteController();
                if(isset($_POST['tweet'])){
                    $controller->tweet($_POST['tweet']);
                }
                $controller->showTweet();
            ?>
            </div>
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
