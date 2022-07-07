<?php
session_start();
include ('connectionBdd.php');
include ('../modeles/utilisateur.php');



if (isset($_POST['update'])){
    if(isset($_POST['nom_utilisateur']) && isset($_POST['prenom_utilisateur']) && isset($_POST['mail_utilisateur']) && isset($_POST['addresse_utilisateur'])){

        // if($_POST['mdp_utilisateur'] == $_POST['confirmer_mdp_utilisateur']){

       $_SESSION['nom_utilisateur'] = $_POST['nom_utilisateur'];
       $_SESSION['prenom_utilisateur'] = $_POST['prenom_utilisateur'];
       $_SESSION['mail_utilisateur'] = $_POST['mail_utilisateur'];
       $_SESSION['addresse_utilisateur']  = $_POST['addresse_utilisateur'];   



        $newuser = new Utilisateur();
        $newuser->setIdUtiliateur(htmlspecialchars($_SESSION['id_utilisateur']));
        $newuser->setNomUtilisateur(htmlspecialchars( $_SESSION['nom_utilisateur']));
      
        $newuser->setPrenomUtilisateur(htmlspecialchars($_SESSION['prenom_utilisateur']));
        $newuser->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
        // $newuser->setTelephoneUtilisateur(htmlspecialchars($_POST['telephone_utilisateur']));
        $newuser->setAddresseUtilisateur(htmlspecialchars($_POST['addresse_utilisateur']));
        // $newuser->setMdpUtilisateur(htmlspecialchars($_POST['mdp_utilisateur']));
        // $newuser->setConfirmationMdpUtilisateur(htmlspecialchars($_POST['confirmer_mdp_utilisateur']));
           
        // $newuser->cryptMdp();
        $newuser->update($bdd);
        
    }
    else{
        
        echo '<script type="text/javascript">alert("echec de la mise a jour, veuillez renseigner les champs correctement..!");
        setTimeout(function(){
        document.location="../vues/profileUtilisateurConnecte.php";
        },1000);
        </script>';
      
       
    }

}

if(isset($_POST['updateMdp'])){    
if(isset($_POST['nouveau_mdp']) && !empty($_POST['nouveau_mdp']) && isset($_POST['confirmer_mdp_utilisateur']) && !empty($_POST['confirmer_mdp_utilisateur']) && isset($_POST['mdp_actuel']) && !empty($_POST['mdp_actuel'])){
      
       if($_POST['nouveau_mdp'] == $_POST['confirmer_mdp_utilisateur'] && $_POST['mdp_actuel'] != $_POST['nouveau_mdp']){
        
        $_SESSION['mdp_utilisateur'] = $_POST['nouveau_mdp'];

        $newuser = new Utilisateur();
        $newuser->setMdpUtilisateur(htmlspecialchars($_SESSION['mdp_utilisateur']));
        $newuser->cryptMdp();
        $newuser->UpdateMdp($bdd);

}else{ 

    echo '<div class="alert alert-danger">ancien mot de passe identique</div>';
}
}else{
    
    echo '<div class="alert alert-danger">information manquant</div>';
}

}
?>

