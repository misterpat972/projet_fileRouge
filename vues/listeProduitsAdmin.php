<?php
// session_start();
include('controleurs/connectionBdd.php');
?>
<!-- récupération des produits dans la table produit -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.min.css" ?>>
    <title>Liste des produits</title>
</head>

<body>
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
                <!-- affichage de la liste des produits -->
                <h1 class="text-center mt-5">Liste des produits</h1>
                <!-- ajout d'un produit -->
                <a href="<?= URL . "ajouter/produit" ?>" class="btn btn-primary mt-5">Ajouter un produits</a>
                <!-- retour à la page d'administration -->
                <a href="gererSite" class="btn btn-success mt-5">Retour accueil Administrateur</a>
                <table class="table mt-3">
                    <thead>
                        <th>id_produit</th>
                        <th>nom_produit</th>
                        <th>description_produit</th>
                        <th>prix_produit</th>
                        <th>img_produit</th>
                        <th>categorie</th>
                    </thead>
                    <tbody>
                        <!--on va parcourir la table produit pour afficher les produits -->
                        <?php foreach ($lesproduits as $produit) : ?>
                            <tr>
                                <td><?= $produit->id_categorie ?></td>
                                <td><?= $produit->nom_produit ?></td>
                                <td><?= $produit->description_produit ?></td>
                                <td><?= $produit->prix_produit ?></td>
                                <td><img src="<?= $produit->img_produit ?>" style="width: 4em;"></td>
                                <td><?= $produit->libelle_categorie ?></td>
                                <td>
                                    <a href="<?= URL . "voir/produit/" . $produit->id_produit ?>" class="text-blue">Voir</a>
                                    <a href="<?= URL . "modifier/article/" . $produit->id_produit ?>" class="text-success">Editer</a>
                                    <a href="<?= URL . "supprimer/produit/" . $produit->id_produit ?>" class="text-danger">Supprimer</a>
                                </td>
                            <?php endforeach; ?>
                            <?php //endif; 
                            ?>
                            </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <script src="JS/listeProduitsAdm.js"></script>
</body>

</html>