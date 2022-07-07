<?php 
// on inclut le fichier modeles qui contient la classe Utilisateur
include ('../modeles/utilisateur.php');
//  on inclut le fichier de connection à la base de données
include ('connectionBdd.php');



if(isset($_POST['nom_utilisateur']) && isset($_POST['prenom_utilisateur']) && isset($_POST['mail_utilisateur']) && isset($_POST['addresse_utilisateur']) && isset($_POST['mdp_utilisateur']) && isset($_POST['confirmer_mdp_utilisateur'])){

if($_POST['mdp_utilisateur'] == $_POST['confirmer_mdp_utilisateur']){  

    // on test si le mail est correct //
    if(!filter_var($_POST['mail_utilisateur'], FILTER_VALIDATE_EMAIL)){
        // die('L\'adresse email est incorrecte');
        echo "<script language=javascript> alert('L\'adresse email est incorrecte'); </script>"; die;
    }


    // on test si le mail est deja existant //
    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE mail_utilisateur = :mail_utilisateur");
    $req->execute(array('mail_utilisateur'=>$_POST['mail_utilisateur']));
    $test_mail = $req->fetch();
    if($test_mail){
       
        echo "<script language=javascript> alert('Ce mail est déjà utilisé');
        document.location='../vues/formulaireInscription.php';
        </script>"; die;
    }             


   
// injection des valeurs utilisateur dans la basse de donnee //
$newuser = new Utilisateur();
$newuser->setNomUtilisateur(htmlspecialchars($_POST['nom_utilisateur']));
$newuser->setPrenomUtilisateur(htmlspecialchars($_POST['prenom_utilisateur']));
$newuser->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
// $newuser->setTelephoneUtilisateur(htmlspecialchars($_POST['telephone_utilisateur']));
$newuser->setAddresseUtilisateur(htmlspecialchars($_POST['addresse_utilisateur']));
$newuser->setMdpUtilisateur(htmlspecialchars($_POST['mdp_utilisateur']));
$newuser->setConfirmationMdpUtilisateur(htmlspecialchars($_POST['confirmer_mdp_utilisateur']));
// scripter le mot de passe //
$newuser->cryptMdp();
$newuser->creationUtilisateur($bdd);

 
}else{

    echo '<p>pb de création</p>';
}

}


    
    






?>