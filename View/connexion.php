<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../skeleton.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="../script.js"></script>
        <title>Tweet Academie</title>
    </head>
    
    <body id="body">

    <form action="connexion.php" method="post">
        <fieldset class="connexion">
            <div class="haut-de-page">
                <img src="../img/oiseau-bleu.png" alt="logo twitter" height="50px" width="50px">
                <h4>Se connecter</h4>
            </div>

        <label for="login">Téléphone, email ou nom d'utilisateur</label>
        <br>
        <input required type="text" name="login" id="login" />
        <br>

        <label for="password"> Mot de passe</label>
        <br>
        <input required type="password" name="password" id="password" />
        <br>

                <button name="submitForm" id="submitConnexion" type="submit">Se connecter</button> </br>
        

                <a href="../View/inscription.php">S'inscrire sur Tweet Academie</a>

        <?php
            require_once("../Controller/connexionController.php");

            $controller = new connexionController;

            if (isset($_POST["login"]) AND isset($_POST["password"]))
            {
                $controller->connectUser($_POST["login"], $_POST["password"]);
            }
        ?>
        
        </fieldset>
    </form>

    </body>
</html>
