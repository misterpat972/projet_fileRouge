<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Fuggles&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/Inscription.css">
</head>
<body>
    <?php
    include('vues/barNav.php');
    ?>
    <div class="loginform">
        <!-- Avatar Image -->
        <div class="avatar">
            <img src="Img/logoSeul.png" alt="Avatar">
        </div>
        <h2>Inscription</h2>
        <!-- Start Form -->
        <form action="inscriptionValid" method="post" enctype="multipart/form-data">
            <!-- nom -->
            <p>Nom</p>
            <input type="text" name="nom_utilisateur" placeholder="Entrer votre Nom" required>
            <!-- prenom -->
            <p>Prénom</p>
            <input type="text" name="prenom_utilisateur" placeholder="Entrer votre Prénom" required>
            <!-- email -->
            <p>E-mail</p>
            <input type="email" name="mail_utilisateur" placeholder="Entrer votre Mail" required>
            <!-- mot de passe -->
            <p>Addresses</p>
            <input type="text" name="addresse_utilisateur" placeholder="Entrer votre addresse" required>
            <!-- mot de passe -->
            <p>Mot de passe</p>
            <input type="password" name="mdp_utilisateur" placeholder="Entre votre mot de passe" required>
            <!-- mot de passe confirmer -->
            <p>Confirmez votre mot de passe</p>
            <input type="password" name="confirmer_mdp_utilisateur" placeholder="Entre votre mot de passe" required>
            <input type="submit" name="login-btn" value="S'inscrire">
        </form>
    </div>









    <footer>



    </footer>


</body>

</html>