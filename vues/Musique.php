<?php
include "vues/header.php";
?>
<title>Musique</title>
<?php
include "vues/barNav.php";
?>
<!-- section message success -->
<section id="section_music">
    <!-- nos musique  -->
    <h2 id="titres" class="text-center">Venez découvrir nos titres</h2>
    <!-- ajout d'un hr centré -->
    <hr id="HrMusic">
    <div class="container d-flex justify-content-center ">
        <?php foreach ($lesproduits as $produit) : ?>
            <div class="text-center py-3 p-4">
                <div class="col-md-3 col-sm-6 my-md-5">
                    <form action="" method="POST">
                        <div class="card" style="width: 18rem; border:none">
                            <img src="<?= $produit->img_produit ?>" width="350" height="250" class="card-img-top" alt="pochette_music">
                            <div class="card-body">
                                <h5 class="card-title"><?= $produit->nom_produit ?></h5>
                                <p class="card-text"><?= $produit->description_produit ?></p>
                                <p class="card-text"><?= $produit->prix_produit ?> €</p>
                                <!-- input des éléments récupérer pour le panier -->
                                <input type="hidden" name="id_produit" value="<?= $produit->id_produit ?>">
                                <input type="hidden" name="nom_produit" value="<?= $produit->nom_produit ?>">
                                <input type="hidden" name="description_produit" value="<?= $produit->description_produit ?>">
                                <input type="hidden" name="prix_produit" value="<?= $produit->prix_produit ?>">
                                <input type="hidden" name="img_produit" value="<?= $produit->img_produit ?>">
                                <input type="hidden" name="quantite" value="1">
                                <!-- bouton d'ajout au panier  -->
                                <!-- si le l'utilisateur est connecté il pourra ajouter sinon retour à la connexion -->
                                <?php if (isset($_SESSION['mail_utilisateur'])) : ?>
                                    <input type="submit" name="ajouterArticle" id="ajouterArticle" value="Ajouter au panier" class="btn btn-primary">
                                <?php else : ?>                                  
                                   <a href="" id="clic_bouton" class="btn btn-primary">Ajouter au panier</a>                                    
                                    <!-- envoi de message à l'utilisateur pour se connecter -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script>
//si l'utilisateur n'est pas connecté il ne pourra pas ajouter un article au panier
   document.getElementById('clic_bouton').addEventListener('click', function(e) {
        e.preventDefault();
       alert('vous devez vous connecter pour ajouter un article au panier');
    });   
</script>
<?php include "vues/Footer.php"; ?>