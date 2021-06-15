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
    <title>Mon Compte</title>
</head>
<body id="body">
    <script src="../script.js"></script>
    <header>
         <nav class="vertical_menu">
            <a href="../View/compte.php"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Home</a>
            <a href="#"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Recherche #</a>
            <a href="#"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Notifications</a>
            <a href="../View/messagerie.php"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Messagerie</a>
            <a href="../View/profil.php?id=<?= $_SESSION['user_id']; ?>"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Profil</a>
            <a href="../View/settings.php"><img class="logo-twitter" src="../img/oiseau-bleu.png" alt="logo_twitter" width="50px">Settings</a>
        </nav>
    
        <div class="setting">
        <!-- Toggle -->

    <label class="switch" id="switch" >
            <input type="checkbox">
            <span class="slider round" onclick="myFunction()"></span>
    </label>
        <h3>Modifier mon profil</h3>
            <form action="settings.php" method="post">
                <label for="actualpseudo">Nom d'utilisateur actuel :</label>
                <input required type="text" name="actualpseudo" id="actualpseudo" value="<?php echo $_SESSION['username']?>" disabled />
                <br>
                <label for="newpseudo">Nouveau nom d'utilisateur :</label>
                <input required type="text" name="newpseudo" id="newpseudo" />
                <br>
                <button name="submitForm" id="submitNewPseudo" type="submit">Modifier</button>
                <?php
                    require_once("../Controller/settingsController.php");

                    $controller = new settingsController;

                    if (isset($_POST["newpseudo"])) {
                        $controller->changePseudo($_POST["newpseudo"]);
                    }
                ?>
            </form>
            <form action="settings.php" method="post">
                <label for="actualpwd">Mot de passe actuel :</label>
                <input required type="password" name="actualpwd" id="actualpwd" />
                <br>
                <label for="newpwd">Nouveau mot de passe :</label>
                <input required type="password" name="newpwd" id="newpwd" />
                <br>
                <label for="confirmnewpwd">Confirmer le nouveau mot de passe :</label>
                <input required type="password" name="confirmnewpwd" id="confirmnewpwd" />
                <br>
                <button name="submitForm" id="submitNewPwd" type="submit">Modifier</button>
                <?php
                    require_once("../Controller/settingsController.php");

                    $controller = new settingsController;

                    if (isset($_POST["actualpwd"]) AND isset($_POST["newpwd"]) AND isset($_POST["confirmnewpwd"])) {
                        $controller->changePassword($_POST["actualpwd"], $_POST["newpwd"], $_POST["confirmnewpwd"]);
                    }
                ?>
            </form>
            <form action="settings.php" method="post">
                <label for="actualmail">Adresse mail actuelle :</label>
                <input required type="email" name="actualmail" id="actualmail" value="<?php echo $_SESSION['email']?>" disabled/>
                <br>
                <label for="newmail">Nouvelle adresse mail :</label>
                <input required type="email" name="newmail" id="newmail" />
                <br>
                <button name="submitForm" id="submitNewMail" type="submit">Modifier</button>
                <?php
                    require_once("../Controller/settingsController.php");

                    $controller = new settingsController;

                    if (isset($_POST["newmail"])) {
                        $controller->changeMail($_POST["newmail"]);
                    }
                ?>
            </form>
            <form action="settings.php" method="post">
                <label for="actualnumber">Numéro de téléphone actuel :</label>
                <input required type="tel" name="actualnumber" id="actualnumber" value="<?php echo $_SESSION['phone']?>" disabled />
                <br>
                <label for="newnumber">Nouveau numéro de téléphone :</label>
                <input required type="tel" name="newnumber" id="newnumber" />
                <br>
                <button name="submitForm" id="submitNewNumber" type="submit">Modifier</button>
                <?php
                    require_once("../Controller/settingsController.php");

                    $controller = new settingsController;

                    if (isset($_POST["newnumber"])) {
                        $controller->changeNumber($_POST["newnumber"]);
                    }
                ?>
            </form>

            <form action="settings.php" method="POST" enctype="multipart/form-data">
                    <label for="avatar">Avatar :</label>
                    <input type="file" name="avatar" />
                    <br>
                    <input type="submit" value="changer avatar" />
                    <br>
                    <?php
                    require_once("../Controller/settingsController.php");
                    $controller = new SettingsController;

                    if (isset($_FILES["avatar"])) {
                        $controller->changeAvatar($_FILES["avatar"]);
                    }
                    ?>
            </form>

            <form action="settings.php" method="POST" enctype="multipart/form-data">
                    <label for="banner">Bannière :</label>
                    <input type="file" name="banner" />
                    <br>
                    <input type="submit" value="changer de bannière" />
                    <br>
                    <?php
                    require_once("../Controller/settingsController.php");
                    $controller = new SettingsController;

                    if (isset($_FILES["banner"])) {
                        $controller->changeBanner($_FILES["banner"]);
                    }
                    ?>
            </form>
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
