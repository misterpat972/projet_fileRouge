<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Fuggles&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/contactNonConnecte.css">
    <meta http-equiv="X-UA-Compatible" content="chrome">
</head>

<body>

    <?php include('barNav.php'); ?>

    <div class="logo">
        <img src="Img/logoUH.png" alt="logo site" width="200px" height="200px">
    </div>
    <!-- formulaire du pied de page -->
    <div id="formulaireContact">
        <div>
            <h1>CONTACT</h1>
        </div>
        <hr>
        <div>
            <!-- email du group  -->
            <h3>unconscious.harmony@gmail.com</h3>
        </div>
        <div id="contactForm">
            <form action="maPage.php" method="post">
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <input type="tel" name="tèl" id="tèl" placeholder="Téléphone" required>
                <input type="email" name="mail" id="mail" placeholder="Adresse e-mail" required>
                <textarea name="message" id="msg" cols="30" rows="10" placeholder="Laissez un message"></textarea>
                <input type="submit" value="NOUS CONTACTER">
            </form>
        </div>
    </div>
    <!-- footer -->
    <footer class="pied">
        <div id="copyPied">
            <h2>Uncounscious Harmony-Groupe Musical</h2>
        </div>
        <h6>Copyright@2021 Tous droits réservés</h6>
        <div id="nousSuivre">
            <form action="maPage.php" method="post">
                <input type="email" name="mail" id="suivre" placeholder="Entrer votre Email" required>
                <input type="submit" value="S'abonner" id="abonner">
            </form>
        </div>
    </footer>
</body>

</html>