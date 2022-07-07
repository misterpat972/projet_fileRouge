<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.min.css" ?>">
    <title>Liste des évènements</title>
</head>
<body>
    <!-- liste des évèvements  -->
    <div class="container">
        <div class="row">
            <section class="mt-3">
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
                 <!-- affichage de message d'erreur -->   
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
                <!-- fin d'affichage message d'erreur -->
                <!-- affichage de la liste des évènements -->
                <h1 class="text-center mt-5">Liste des évèvements</h1>
                <!-- ajout d'un évènement -->
                <a href="<?= URL . "ajouterEvenement" ?>" class="btn btn-primary mt-5">Ajouter un évènement</a>
                <!-- retour à la page d'administration -->
                <a href="gererSite" class="btn btn-success mt-5">Retour accueil Administrateur</a>
                <table class="table mt-3">
                    <thead>
                        <th>id_evenement</th>
                        <th>nom</th>
                        <th>descriptiont</th>
                        <th>date</th>
                        <th></th>
                        <th>commentaire</th>
                    </thead>
                    <tbody>
                        <!--on va parcourir la table évènment pour afficher les évènements -->
                        <?php foreach ($lesevenements as $evements) : ?>
                            <tr>
                                <td><?= $evements->id_evenement ?></td>
                                <td><?= $evements->nom_evenement ?></td>
                                <td><?= $evements->description_evenement?></td>
                                <td><?= date("d-m-Y", strtotime($evements->date_evenement))?></td>                                
                                <td>
                                    <!-- voir un évènement dans la table -->
                                    <a href="<?= URL . "voirEvenement". "/" . $evements->id_evenement ?>" class="btn btn-primary">Voir</a>
                                    <!-- modifier un évènement dans la table -->
                                    <a href="<?= URL . "modifierEvenement"."/"."evenement" . "/" . $evements->id_evenement ?>" class="btn btn-warning">Modifier</a>
                                    <!-- supprimer un évènement dans la table -->
                                    <a href="<?= URL . "supprimerEvenement". "/" . $evements->id_evenement ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <script src="JS/listeProduitsAdm.js"></script>

</body>

</html>