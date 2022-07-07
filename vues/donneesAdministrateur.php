<?php
include('controleurs/connectionBdd.php');
?>
<?php
// si le le mail et l'id_droit different de 2 ne sont pas remplis on redirige vers l'accueil
if (!isset($_SESSION['mail_utilisateur']) && $_SESSION['id_droit'] != 2) {
    header('Location: formulaireConnection.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profileUtilisateurConnecte.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <title>Administration</title>
</head>
<body>
    <!-----------------------Navbar -------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!---- affichage de nom de l'utilisateur ---->
        <a class="navbar-brand p-3" href="#">Bienvenue <?php echo $_SESSION['prenom_utilisateur'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="#navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!--- gestion des Membres --->
                <a class="nav-item nav-link active" href="<?= URL . "lesUtilisateurs" ?>">Membres</a>
                <!--- gestion des produit ---->
                <a class="nav-item nav-link" href="<?= URL . "lesProduits" ?>">Produits</a>
                <!---gestion des evenements --->
                <a class="nav-item nav-link" href="<?= URL . "lesEvenements" ?>">Évènements</a>
                <a class="nav-item nav-link" href="#">Commentaire</a>
                <a class="nav-item nav-link" href="#">Commande</a>
                <a class="nav-item nav-link" href="deconnexion">Déconnexion</a>
            </div>
        </div>
    </nav>
    <!----------------------- Fin Navbar -------------------->
    <!-- affichage de message de création ou mise à jour d'un produit -->
    <?php
    if (!empty($_SESSION['message'])) {
    ?>
        <div class="alert">
            <p class="alert alert-success">
                <?php
                echo $_SESSION['message'];
                $_SESSION['message'] = "";
                ?>
            </p>
        </div>
    <?php } ?>

    <!-- fin d'affichage message de création ou mise à jour d'un produit -->
    <?php if (!empty($_SESSION['error'])) { ?>
        <div class="alertError">
            <p class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                $_SESSION['error'] = "";
                ?>
            </p>
        </div>
    <?php } ?>

    <!----------------------- Profil -------------------->
    <div class="container-xl px-4 mt-5">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <!--- profile utilisateur --->
            <a class="nav-link active ms-0" href="#">Profile</a>
            <!--- retour à l'accueil --->
            <a class="nav-link" href="retour à l'accueil">Retour à l'accueil</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="image col-xl-4">
                <!-- Image du profile -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Image du profile</div>
                    <div class="card-body text-center">
                        <!-- image -->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- type d'image que l'on accepte -->
                        <div class="small font-italic text-muted mb-4">JPG ou PNG 5.MB max</div>
                        <!-- téléchargement des images-->
                        <button class="btn btn-primary" type="button">Télécharger une nouvelle image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!----------------- Détail du compte ----------------->
                <div class="card mb-4">
                    <div class="card-header">Détails du compte</div>
                    <form method="POST" action="modifier le compte">
                        <div class="card-body">

                            <!--------------------- Form Row ----------------->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Prénom</label>
                                    <input class="form-control" name="prenom_utilisateur" id="inputFirstName" type="text" placeholder="Entrer votre prénom" value="<?php echo $_SESSION['prenom_utilisateur'] ?>">
                                </div>
                                <!---------------- Form Group (last name)--------------->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Nom</label>
                                    <input class="form-control" name="nom_utilisateur" id="inputLastName" type="text" placeholder="Entrer votre nom" value="<?php echo $_SESSION['nom_utilisateur'] ?>">
                                </div>
                            </div>
                            <!---------------- Form Row -------------------->
                            <div class="row gx-3 mb-3">
                                <!----------- Form Group (organization name)------------>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Email</label>
                                    <input class="form-control" name="mail_utilisateur" id="inputOrgName" type="email" placeholder="mail@example.com" value="<?php echo $_SESSION['mail_utilisateur'] ?>">
                                </div>
                                <!--------------- Form Group (location) ----------->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Addresse</label>
                                    <input class="form-control" name="addresse_utilisateur" id="inputLocation" type="text" placeholder="" value="<?php echo $_SESSION['addresse_utilisateur'] ?>">
                                </div>
                            </div>

                            <button type="submit" name="update" class="btn btn-primary">Modifier le profile</button>
                            <button type="button" class="btn btn-secondary" id="modifier">Modifier mot de passe</button>
                            <button class="btn btn-danger float-right" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Supprimer le profile</button>

                            <!------------- Modal suppression compte -------------->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Suppression du compte</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            !Attention vous allez supprimer définitivement votre compte
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------- Modal modification compte -------------->
                            <script type="text/javascript">
                                $('#modifier').click(function() {
                                    $('.container').css('display', 'none');
                                    $('.container').css('display', 'block');
                                });
                            </script>

                            <style type="text/css">
                                .container {
                                    display: none;
                                }
                            </style>
                    </form>

                    <!--nouveau mot de passe -->
                    <form action="../controleurs/miseAJourUtilisateur.php" method="POST">
                        <div class="container">
                            <div class="mb-3 mt-5">
                                <label class="small mb-1" for="currentPassword">Mot de passe actuel</label>
                                <input class="form-control" name="mdp_actuel" id="currentPassword" type="password" placeholder="Entrer le mot de passe actuel" required="">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">Nouveau mot de passe</label>
                                <input class="form-control" name="nouveau_mdp" id="newPassword" type="password" placeholder="Entrer le nouveau mot de passe">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3 ">
                                <label class="small mb-1" for="confirmPassword">Confirmer le nouveau mot de passe</label>
                                <input class="form-control" name="confirmer_mdp_utilisateur" id="confirmPassword" type="password" placeholder="Confirm le nouveau mot de passe">
                            </div>
                            <button class="btn btn-primary" name="updateMdp" type="submit">Sauvegarder</button>
                            <button class="btn btn-danger" id="annuler" type="button">Annuler</button>
                            <!------------- script JS qui permet de refermer le modale ne cas d'annulation modification -------------->
                            <script type="text/javascript">
                                $('#annuler').click(function() {
                                    $('.container').css('display', 'block');
                                    $('.container').css('display', 'none');
                                });
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src=<?= URL . "JS/listeProduitsAdm.js" ?>></script>
</body>

</html>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>