<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.css" ?>>
   <title>Mise à jour Utilisateur</title>
</head>

<body>
   <main class="container">
      <div class="row justify-content-center col-md-12 mt-5">
         <!-- mise à jour d'un utilisateur -->
         <h1 class="text-center">Mettre à jour l'utilisateur</h1>
         <div class="col-md-8 mt-5">
            <form action="<?= URL . "modif/editeUtilisateur/" . $_SESSION['id_utilisateur'] ?>" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                  <!-- nom utilisateur -->
                  <label for="nom_produit">Nom</label>
                  <input type="text" id="name" name="nom_utilisateur" placeholder="" required class="form-control" value=" <?php echo $_SESSION['nom_utilisateur'] ?>">
               </div>
               <div class="form-group">
                  <!-- prenom utilisateur -->
                  <label for="prenom_utilisateur">prenom</label>
                  <input type="text" id="prenom_utilisateur" name="prenom_utilisateur" placeholder="" required class="form-control" value="<?php echo $_SESSION['nom_utilisateur'] ?>">
               </div>
               <div class="form-group">
                  <!-- email utilisateur -->
                  <label for="mail_utilisateur">mail</label>
                  <input type="mail" id="mail_utilisateur" name="mail_utilisateur" placeholder="" required class="form-control" value="<?php echo $_SESSION['mail_utilisateur'] ?>">
               </div>
               <div class="form-group">
                  <!-- mot de passe utilisateur -->
                  <label for="adresse">adresse</label>
                  <input type="text" id="adresse" name="addresse_utilisateur" placeholder="" required class="form-control" value="<?php echo $_SESSION['addresse_utilisateur'] ?>">
               </div>
               <div class="form-group mt-3">

                  <select class="form-select" name="id_droit" required aria-label="Default select example">
                     <option selected>Selection de la categorie</option>
                     <option value="1">Utilisateur</option>
                     <option value="2">Admin</option>
                  </select>
               </div>
               <div class="form-group mt-3">
                  <!-- boutton de validation -->
                  <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                  <!-- boutton de retour aux membres -->
                  <a href=<?= URL . "lesUtilisateurs" ?> class="btn btn-success">Retour aux Membres</a>
               </div>
            </form>
         </div>
      </div>
   </main>
   <script src=<?= URL . "JS/listeProduitsAdm.js" ?>></script>
</body>

</html>