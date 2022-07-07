<?php
// si le le mail ou l'id_droit ne sont pas remplis on redirige vers l'accueil
if (!isset($_SESSION['mail_utilisateur']) || $_SESSION['id_droit'] != 1) {
    $_SESSION['error'] = "identifiant incorrect";
    header('Location: connexion');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>
    <!-- message success -->
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
    <!-- fin message success -->
    <div class="container-xl px-4 mt-5 ">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <!-- Profile -->
            <a class="nav-link active ms-0" href="#">Profile</a>
            <!-- Commandes -->
            <a class="nav-link" href="commandeUtilisateurConnecte.php">Commandes</a>
            <!-- Panier -->
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Commentaires</a>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <a class="nav-link" href="<?= URL . 'retour à l\'accueil' ?>">Retour à l'accueil</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row py-5">
            <div class="image col-xl-4">
                <!-- Image du profile-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Image du profile</div>
                    <div class="card-body text-center">
                        <!-- image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- extention d'image accepté -->
                        <div class="small font-italic text-muted mb-4">JPG ou PNG 5.MB max</div>
                        <!-- bouton téléchargement d'image -->
                        <button class="btn btn-primary" type="button">Télécharger une nouvelle image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Détails du compte -->
                <div class="card mb-4">
                    <div class="card-header">Détails du compte</div>
                    <form method="POST" action="<?= URL . "modifier le compte" ?>">
                        <div class="card-body">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Prénom</label>
                                    <input class="form-control" name="prenom_utilisateur" id="inputFirstName" type="text" placeholder="Entrer votre prénom" value="<?= $_SESSION['prenom_utilisateur'] ?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Nom</label>
                                    <input class="form-control" name="nom_utilisateur" id="inputLastName" type="text" placeholder="Entrer votre nom" value="<?= $_SESSION['nom_utilisateur'] ?>">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Email</label>
                                    <input class="form-control" name="mail_utilisateur" id="inputOrgName" type="email" placeholder="mail@example.com" value="<?= $_SESSION['mail_utilisateur'] ?>">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Addresse</label>
                                    <input class="form-control" name="addresse_utilisateur" id="inputLocation" type="text" placeholder="" value="<?= $_SESSION['addresse_utilisateur'] ?>">
                                </div>
                            </div>

                            <button type="button" name="update" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modif">Modifier le profile</button>
                            <button type="button" class="btn btn-secondary" id="modifier">Modifier mot de passe</button>
                            <button class="btn btn-danger float-right" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Supprimer le profile</button>

                            <!------------- Modal pour la suppression de compte -------------->
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <!--<button type="button"  class="btn btn-danger">Supprimer</button>-->
                                            <a href="<?= URL . "supprimer mon compte" ?>" type="button" class="btn btn-danger">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!------------- Modal pour la modification du compte -------------->
                            <div class="modal fade" id="modif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modification du compte</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            !Attention vous êtes sur le point de modifier votre compte
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <!--<button type="button"  class="btn btn-danger">Supprimer</button>-->
                                            <!-- <a href="<?= URL . "modifier le compte" ?>" type="button" class="btn btn-danger">Modifier</a> -->
                                            <button type="submit" class="btn btn-danger">Modifier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </form>
                    <!--- permet de faire apparaître et disparaître le mot de passe --->
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

                    <!--nouveau mot de passe -->
                    <form action="" method="POST">
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
                            <!------------- script permet de fermer la partie mot de passe -------------->
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
    <script src=<?= URL . "JS/listeProduitsAdm.js" ?>></script>
</body>

</html>