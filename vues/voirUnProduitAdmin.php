<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.css" ?>>
    <link rel="stylesheet" href=<?= URL . "css/voirUnproduitAdm.css" ?>>
    <title>Produit</title>
</head>
<body>
    <main class="container">
        <div class="col-md-12 mt-5 ">
            <!-- nom du produit -->
            <p><img src="<?= URL . $_SESSION['img_produit']; ?>"></p>
            <!-- id du produit -->
            <h1>Produit n° <?php echo $_SESSION['id_produit'] ?></h1>
            <!-- nom du produit -->
            <p>Nom : <?php echo $_SESSION['nom_produit'] ?></p>
            <!-- description du produit -->
            <p>Description : <?php echo $_SESSION['description_produit']; ?></p>
            <!-- prix du produit -->
            <p>prixt : <?php echo $_SESSION['prix_produit']; ?>€</p>
            <!-- retour à la liste des produits -->
            <a href=<?= URL . "lesProduits" ?> class="btn btn-danger">Retour</a>
        </div>
    </main>
</body>

</html>