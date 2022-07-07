<?php 
// session_start();
// include ('../controleurs/connectionBdd.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <main class="container mt-5 ">
        <div class="row justify-content-center col-md-12">
                    
                        <h1 class="text-center">Ajouter un article</h1>
                                              
            <div class="col-md-8 mt-5">            
                    <form action="<?= URL."creationProduit"?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="nom_produit">Nom</label>
                           <input type="text" id="name" name="nom_produit" placeholder="nom du produit" required class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="description_produit">Description</label>
                           <input type="text" id="description" name="description_produit" placeholder="description du produit" required class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="prix_produt">Prix</label>
                           <input type="text" id="prix_produit" name="prix_produit" placeholder="prix du produit" required class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="img_produit">Image</label>
                           <input type="file" id="img_produit" name="img_produit" placeholder="image du produit"  required class="form-control">
                        </div>
                        <div class="form-group mt-3">
                        <select class="form-select"  name="id_categorie"  aria-label="Default select example">
                           <option selected >Selection de la categorie</option>
                           <option value="1">Albums</option>
                           <option value="2">Pistes</option>                          
                        </select>
                        </div>
                        <div class="form-group mt-3">
                           <button type="submit" class="btn btn-primary">Ajouter</button>
                           <a href="<?= URL ."lesProduits"?>" class="btn btn-success">Retour aux articles</a>
                        </div>

                    </form>
            </div>
        </div>
    </main>
</body>
</html>