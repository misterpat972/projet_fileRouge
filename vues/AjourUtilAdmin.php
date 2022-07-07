<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.css" ?>>
   <title>Ajout d'un utilisateur</title>
</head>
<body>
   <!-- formulaire d'ajout d'un utilisateur -->
   <main class="container mt-5 ">
      <div class="row justify-content-center col-md-12">
         <h1 class="text-center">Ajout d'un utilisateur</h1>
         <div class="col-md-8 mt-5">
            <form action="<?= URL . "ajout-utilisateur" ?>" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                  <!-- nom de l'utilisateur -->
                  <label for="nom_produit">Nom</label>
                  <input type="text" id="nom_utilisateur" name="nom_utilisateur" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <!-- prenom de l'utilisateur -->
                  <label for="prenom_utilisateur">Prenom</label>
                  <input type="text" id="prenom_utilisateur" name="prenom_utilisateur" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <!-- email de l'utilisateur -->
                  <label for="mail_utilisateur">Mail</label>
                  <input type="text" id="mail_utilisateur" name="mail_utilisateur" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <!-- mot de passe de l'utilisateur -->
                  <label for="adresse">adresse</label>
                  <input type="text" id="adresse" name="addresse_utilisateur" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <!-- mot de passe de l'utilisateur -->
                  <label for="mdp_utilisateur">mot de passe</label>
                  <input type="text" id="adresse" name="mdp_utilisateur" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <!-- mot de passe de l'utilisateur -->
                  <label for="confirmer_mdp_utilisateur">confirmer le mot de passe</label>
                  <input type="text" id="adresse" name="confirmer_mdp_utilisateur" placeholder="" class="form-control">
               </div>
               <div class="form-group mt-3">
                  <select class="form-select" name="id_droit" aria-label="Default select example">
                     <!---role de l'utilisateur -->
                     <option selected>Selection du rôle</option>
                     <option value="1">Utilisateur</option>
                     <option value="2">Administrateur</option>
                  </select>
               </div>
               <div class="form-group mt-3">
                  <!-- bouton de validation -->
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                  <a href="<?= URL . "lesUtilisateurs" ?>" class="btn btn-success">Retour à la liste d'utilisateur</a>
               </div>
            </form>
         </div>
      </div>
   </main>
</body>

</html>