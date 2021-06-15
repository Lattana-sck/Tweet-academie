<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=tweetacademie;charset=UTF8", "root" , "root");

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $rep = $bdd->prepare('SELECT * FROM users WHERE user_id = ?');
    $rep->execute(array($getid));
    $userinfo = $rep->fetch();
?>
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
        <?php
            echo "<p>".$userinfo['fullname']."</p>";
        ?>
            <div id="banniere" style="background: url(<?php 
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=tweetacademie;charset=utf8', 'root', 'root');} 
                catch (PDOexception $e) {
                    print "Erreur !: " . $e->getMessage();
                    die();}

                $req = $bdd->query("SELECT * FROM users WHERE user_id = ".$_GET['id']." ");
                while($data = $req->fetch()){
                    echo $data["banner"];
                }
                $req->closeCursor();
                ?>);background-size: cover">
                    <div id="photo_profil" style="background: url(<?php 
                    $req = $bdd->query("SELECT * FROM users WHERE user_id = ".$_GET['id']." ");
                    while($data = $req->fetch()){
                        echo $data["picture"];
                    }
                    $req->closeCursor();
                    ?>);background-size: cover">
                    </div>
            </div>    
            <div id="profil_content">
                <?php
                if(isset($_SESSION['user_id']) AND $_SESSION['user_id'] != $_GET["id"]) {
                    $isfollowingornot = $bdd->prepare('SELECT * FROM follows WHERE follower_id = ? AND user_id = ?');
                    $isfollowingornot->execute(array($_SESSION['user_id'], $getid));
                    $isfollowingornot = $isfollowingornot->rowCount();
                    if($isfollowingornot == 1) {
                ?>
                <a href="follow.php?followedid=<?php echo $getid; ?>">Se désabonner</a>
                <?php 
                    }
                    else {
                ?>
                <a href="follow.php?followedid=<?php echo $getid; ?>">Suivre</a>
                <?php 
                    } 
                }
                    echo "<p>".$userinfo['fullname']."</p>";
                    echo "<p>@".$userinfo['username']."</p>";
                    echo "<p>".$userinfo['birthdate']."</p>";
                    echo "<p><a href='../View/followers.php'># Followers </a>| <a href='../View/following.php'># Followings</a></p>";
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
<?php
}
?>