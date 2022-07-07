<?php 
	session_start(); 
	include ('../modeles/utilisateur.php');
  include ('../controleurs/connectionBdd.php');  
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    
    <!-- <link rel="stylesheet" href="Inscription.css"> -->
 
	<title>Profile utilisateur</title>
</head>
<body>

<!-- si l'utilisateur ne correspond pas redirection au formulaire de connection -->
    <?php
    if(!isset($_SESSION['mail_utilisateur'])){
        header('Location: formulaire connection.php');
        exit();
    }
    ?>

   <?php $id = $_SESSION['id_utilisateur']?>

<!-- récupération des données utilisateur dans la base de donnée -->
<?php

$sql =$bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = '$id'"); 
$sql->execute();


$data = $sql->fetchAll();

 if($data != null){
             
     foreach($data as $row){

         $id = $row['id_utilisateur'];
         $nom_utilisateur = $row['nom_utilisateur'];
         $prenom_utilisateur = $row['prenom_utilisateur'];
         $mail_utilisateur = $row['mail_utilisateur'];  
         $addresse_utilisateur = $row['addresse_utilisateur'];            
         $password = $row['mdp_utilisateur'];        

     }
    }

 ?>


    <div class="">
	<h2> Bienvenu <?php echo $row['nom_utilisateur']?></h2>
    
    </div>
<div class="contenaire">    
    <div class="mx-2 mt-4">
    <h3>Profil</h3>
    
    
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">mail</th>
      <th scope="col">adresse</th>
    </tr>
  </thead>
  <tbody>   
    <tr>
      <th scope="row"></th>
      <td><?php echo $row['nom_utilisateur']?></td>
      <td><?php echo $row['prenom_utilisateur']?></td>
      <td><?php echo $row['mail_utilisateur']?></td>
      <td><?php echo $row['addresse_utilisateur']?></td>
    </tr>   
  </tbody>
</table>

<button type="submit" class="btn btn-primary" id="modif">Mettre à jour mon profil</button>
<button type="submit" class="btn btn-danger" id="annuler">Annuler</button>
<a href="../controleurs/deconnexion.php"><button type="submit" class="btn btn-secondary" id="déconnexion">Déconnexion</button>
<a href="headerUtilisateurConnecté.php"><button type="submit" class="btn btn-success float-right" id="retour">Retour à l'accueil</button></a>
<!-- <a href="welcome.php?id=<?php echo $_SESSION["id_utilisateur"];?>"><button type="button" class="btn btn-danger">Update</button></a> -->
</div>
</div>


<!-- pour faire apparaitre et dispaitre le formulaireUdapte -->
<script type="text/javascript">

$('#modif').click(function(){

    $('.container-form').css('display', 'none');
    $('.container-form').css('display', 'block');

});

$('#annuler').click(function(){

    $('.container-form').css('display', 'block');
    $('.container-form').css('display', 'none');

});

</script>



<style type="text/css">
.container-form{
    display: none;
}

</style>






<!-- formulaire mise à jour -->
<div class="container-form">
<div class="col-lg-6">
    <h2>basic connection</h2>
<form name="form1" class="form" method="POST" action="../controleurs/miseAJourUtilisateur.php">

  <div class="form-group">
    <label for="email">Nom</label>
    <input type="text" name="nom_utilisateur" class="form-control" id="nom" value="<?php echo $row['nom_utilisateur']?>">
  </div>

  <div class="form-group">
    <label for="pwd">Prenom</label>
    <input type="text" name="prenom_utilisateur" class="form-control" id="prenom" value="<?php echo $row['prenom_utilisateur']?>">
  </div>

  <div class="form-group">
    <label for="email">Mail</label>
    <input type="email" name="mail_utilisateur" class="form-control" id="mail" value="<?php echo $row['mail_utilisateur']?>">
  </div>

  <div class="form-group">
    <label for="pwd">Addresse</label>
    <input type="text" name="addresse_utilisateur" class="form-control" id="addresse" value="<?php echo $row['addresse_utilisateur']?>">
  </div>  

  <div class="form-group">
    <label for="pwd">Mot de passe</label>
    <input type="password" name="mdp_utilisateur" class="form-control" id="mdp_utilisateur" placeholder="veuillez entrer votre mot de passe" required="">
  </div>  

  <div class="form-group">
    <label for="pwd">Confirmer mot de passe</label>
    <input type="text" name="confirmer_mdp_utilisateur" class="form-control" id="confirmer_mdp_utilisateur" placeholder="veuillez confirmer votre mot de passe" required="">
  </div>  
  
  <!-- <a href="miseAJourUtilisateur.php?id=<?php echo $_SESSION["id_utilisateur"];?>"><button type="button" name="update" class="btn btn-danger">Update</button></a> -->
  

  <button type="submit" name="delete" class="btn btn-danger float-right">Supprimer mon profil</button>
  <button type="submit" name="update" class="btn btn-primary">Mettre a jour mon profil</button>
</form>
</div>
</div>   

</body>
</html>

