<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../skeleton.css">
    <title>Inscription</title>
</head>
<body>

    
<!-- Formulaire -->

<fieldset class="inscription">
    <div class="haut-de-page">
        <img src="../img/oiseau-bleu.png" alt="logo twitter" height="50px" width="50px">
        <h3>S'inscrire</h3>
    </div>

    <form action="inscription.php" method="POST">

        <!-- Fullname -->
        <label for="nom">Votre nom et prénom</label>
        <input required type="text" name="fullname" placeholder="Votre nom et prénom"> </br>

        <!-- Date naissance -->
        <label for="date">Date de naissance</label>
        <input required type="date" name="birthdate" id="birthdate" placeholder="Votre date de naissance"></br>

        <!-- Telephone -->
        <label for="number">Numéro de téléphone</label>
        <input type="number" name="number" id="number" placeholder="Votre téléphone"></br>

        <!-- Email -->
        <label for="email">Votre email</label>
        <input required type="email" name="email" placeholder="Votre email"></br>

        <!-- Password -->
        <label for="password">Mot de passe</label>
        <input required type="password" name="password" placeholder="Votre mot de passe"></br>

        <!-- Pseudo -->
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"></br>
        
        <button name="submitForm" id="submitForm" type="submit">S'inscrire</button>

    </form>
    <a href="../View/connexion.php">Se connecter</a>

    <?php
    require_once('../Controller/inscriptionController.php');
    $controller = new inscriptionController();

    if (isset($_POST['fullname']) && isset($_POST['birthdate']) && isset($_POST['number']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pseudo']))
    {
       $controller->createUser($_POST['fullname'], $_POST['birthdate'], $_POST['number'], $_POST['email'], $_POST['password'], $_POST['pseudo']); 
    }
    ?>
</fieldset>
</html>