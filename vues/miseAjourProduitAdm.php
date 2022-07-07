<!-- message d'erreur si tout ne s'est pas bien passé -->
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
<!-- fin message d'erreur -->
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.css" ?>>
   <title>Mise à jour</title>
</head>

<body>
   <main class="container">
      <div class="row justify-content-center col-md-12 mt-5">
         <!-- mise à jour d'un produit -->
         <h1 class="text-center">Mettre à jour le produit</h1>
         <div class="col-md-8 mt-5">
            <form action="<?= URL . "modifier/editer/" . $_SESSION['id_produit']  ?>" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                  <!-- nom du produit -->
                  <label for="nom_produit">Nom</label>
                  <input type="text" id="name" name="nom_produit" placeholder="" required class="form-control" value="<?php echo $_SESSION['nom_produit'] ?>">
               </div>
               <div class="form-group">
                  <!-- description du produit -->
                  <label for="description_produit">Description</label>
                  <input type="text" id="description" name="description_produit" placeholder="" required class="form-control" value="<?php echo $_SESSION['description_produit'] ?>">
               </div>
               <div class="form-group">
                  <!-- prix du produit -->
                  <label for="prix_produt">Prix</label>
                  <input type="text" id="prix_produit" name="prix_produit" placeholder="" required class="form-control" value="<?php echo $_SESSION['prix_produit'] ?>">
               </div>
               <div class="form-group">
                  <!-- image du produit -->
                  <label for="img_produit">Image 5Mo max</label>
                  <input type="file" id="img_produit" name="img_produit" placeholder="" required class="form-control">
               </div>
               <div class="form-group mt-3">
                  <!-- catégorie du produit -->
                  <select class="form-select" name="id_categorie" required aria-label="Default select example">
                     <option selected>Selection de la categorie</option>
                     <option value="1">Albums</option>
                     <option value="2">Pistes</option>
                  </select>
               </div>
               <div class="form-group mt-3">
                  <!-- modification du produit -->
                  <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                  <!-- retour aux articles -->
                  <a href=<?= URL . "lesProduits" ?> class="btn btn-success">Retour aux articles</a>
               </div>
            </form>
         </div>
      </div>
   </main>
   <script src=<?= URL . "JS/listeProduitsAdm.js" ?>></script>
</body>

</html>