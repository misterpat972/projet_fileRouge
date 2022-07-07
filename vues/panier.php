<!-- header -->
<?php require_once 'vues/header.php'; ?>
<!-- navbar -->
<?php require_once 'vues/barNav.php'; ?>
<div class="container ">
    <h3 class="title text-center py-5">Panier</h3>
    <div class="table-responsive">
        <table class="table table-borderd">
            <tr>
                <th>Nom du produit</th>
                <th>Description du produit</th>
                <th>Prix du produit</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php if (!empty($_SESSION['panier'])) :
                $total = 0;
                foreach ($_SESSION['panier'] as $key => $value) :
            ?> <tr>
                        <td><?= $value['nom_produit'] ?></td>
                        <td><?= $value['description_produit'] ?></td>
                        <td><?= $value['prix_produit'] ?> €</td>
                        <td><?= $value['quantite'] ?></td>
                        <td><?= number_format($value['prix_produit'] * $value['quantite']) ?></td>
                        <td>
                            <!-- bouton suppréssion de l'article -->
                            <form action="" method="POST">
                                <a href="<?= URL . "afficherPanier" . "/" . "supprimerArticle" . "/" . $value['id_produit'] ?>">
                                    <!-- <button class="btn btn-danger">Supprimer</button> -->
                                    <input type="submit" name="supprimerArticle" class="btn btn-danger" value="Supprimer">
                                </a>
                            </form>
                            <!-- <form action="<?= URL . "supprimerArticle" . "/" . $value['id_produit'] ?>" method="post">                               
                             <button type="submit" name="supprimerArticle" class="btn btn-warning"><i class="fas fa-trash-alt"> Supprimer</i></button> 
                            </form> -->
                        </td>
                    </tr>
                    <!-- total des produits -->
                    <?php $total = $total + ($value['prix_produit'] * $value['quantite']); ?>
                    <!-- vider le panier -->
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td><?= number_format($total) ?> €</td>
                    <td>
                        <form action=<?= URL . "viderPanier" ?> method="post">
                            <button type="submit" name="viderPanier" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer tout</button>
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
            <!-- si rien dans le panier alors on affiche panier vide  -->
            <?php if (empty($_SESSION['panier'])) : ?>
                <tr>
                    <td colspan="6">
                        <p class="text-center">Votre panier est vide</p>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
<!-- Footer -->
<?php require_once 'Footer.php'; ?>

