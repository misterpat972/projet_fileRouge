<?php
//  session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Connection</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Fuggles&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Connection.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <!-- message intercepter -->
    <?php
    if (!empty($_SESSION['error'])) {
    ?>
        <div class="container">
            <div class="alertError py-5">
                <p class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    $_SESSION['error'] = "";
                    ?>
                </p>
            </div>
        </div>
    <?php } ?>



    <?php include('barNav.php'); ?>







    <div class="loginform">
        <!-- Avatar Image -->
        <div class="avatar">
            <img src="Img/logoSeul.png" alt="Avatar">
        </div>
        <h2>Connection</h2>
        <!-- Start Form -->
        <form action="connexion_valid" method="POST">
            <p>Email</p>
            <input type="email" name="mail_utilisateur" placeholder="Entre votre Nom" requeried="">
            <p>mot de passe</p>
            <input type="password" name="mdp_utilisateur" placeholder="Entrez votre mot de passe" required="">
            <input type="submit" name="connection" value="Se connecter">
            <a href="#">mot de passe oublié?</a>
            <a href="inscription" class="have-not">pas de compte?</a>
        </form>
    </div>







    <script src="JS/listeProduitsAdm.js"></script>


</body>

</html>