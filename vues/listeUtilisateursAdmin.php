<?php
include('controleurs/connectionBdd.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.min.css" ?>>
    <title>Liste Utilisateur</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <section class="mt-3">

                <!-- affichage de message de création ou mise à jour d'un utilisateur -->
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
                <!-- fin d'affichage message d'erreur -->
                <!-- affichage de la liste des membres -->
                <h1 class="text-center mt-5">Liste des Membres</h1>
                <!-- ajout d'un membre -->
                <a href="<?= URL . "inscription-utilisateur" ?>" class="btn btn-primary mt-5">Ajout d'un membre</a>
                <!-- retour à la page d'administration -->
                <a href="<?= URL . "gererSite" ?>" class="btn btn-success mt-5">Retour accueil Administrateur</a>
                <table class="table mt-3">
                    <thead>
                        <th>id_utilisateur</th>
                        <th>nom_utilisateur</th>
                        <th>prenom_utilisateur</th>
                        <th>mail_utilisateur</th>
                        <th>adresse_utilisateur</th>
                        <th>droit_utilisateur</th>
                    </thead>
                    <tbody>
                        <!--on va parcourir la table produit pour afficher des utilisateur -->
                        <?php if (!empty($result)) : ?>
                            <?php foreach ($result as $utilisateur) : ?>
                                <tr>
                                    <td><?= $utilisateur->id_utilisateur ?></td>
                                    <td><?= $utilisateur->nom_utilisateur ?></td>
                                    <td><?= $utilisateur->prenom_utilisateur ?></td>
                                    <td><?= $utilisateur->mail_utilisateur ?></td>
                                    <td><?= $utilisateur->addresse_utilisateur ?></td>
                                    <td><?= $utilisateur->nom_droit ?></td>
                                    <td>
                                        <a href="<?= URL . "modif/utilisateur/" . $utilisateur->id_utilisateur ?>" class="text-success">Editer</a>
                                        <a href="<?= URL . "suppr/utilisateur/" . $utilisateur->id_utilisateur ?>" class="text-danger">Supprimer</a>
                                    </td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                                </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <script src="JS/listeProduitsAdm.js"></script>
</body>

</html>