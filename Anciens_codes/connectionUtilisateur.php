<?php 
session_start();

// include('../vues/formulaireConnection.php');
include_once('connectionBdd.php');
include ('../modeles/utilisateur.php');


if(!empty($_POST['mail_utilisateur']) and !empty($_POST['mdp_utilisateur'])){
   
   $newuser = new Utilisateur();
   $newuser->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
   $newuser->setMdpUtilisateur(htmlspecialchars($_POST['mdp_utilisateur']));              
  
   $newuser->connectionUtilisateur($bdd);


}
else{
  
  ;
   // echo "<p> saisir un identifiant</p>";
   header("Location: ../vues/formulaireConnection.php");
}




    //  if(isset($_POST["mail_utilisiteur"]) && ($_POST["mdp_utilisiteur"])

    //   && !empty($_POST["mail_utilisiteur"] && !empty($_POST["mdp_utilisiteur"]))){ 

    //    $newuser = new Utilisateur();
    //    $newuser->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
    //     $newuser->setMdpUtilisateur(htmlspecialchars($_POST['mdp_utilisateur']));
    //    $newuser->cryptMdp();
      
    //    on verifie que c'est vien un email 
    //      if(filter_var($_POST["mail_utilisiteur"], FILTER_VALIDATE_EMAIL)){

    //          die("ce n'est pas un email");        
    //      }

    //     $newuser->connectionUtilisateur($bdd);
       

    //    }else{

         
    //   }
               
    //     on se connnect à la base de donné 
       

    //     $sql = "SELECT * FROM  `utilisateur` WHERE `mail_utilisiteur` = :mail_utilisateur";

    //     $query = $db->prepare($sql);
    //      $query->bindValue(":mail_utilisateur", $_POST["mail_utilisateur"], PDO::PARAM_STR);

    //      $query->execute();

    //   $user = $query->fetch();
        
    //      echo($user);
     
    //    if(!$user){
    //      die("Error");
    //     }

    //     if(!password_verify($_POST["mdp_utilisateur"], $user["mdp_utilisateur"])){

    //      die("Error");
    //     };

    //    ici utilisateur et mot de passe valide 
    //    session_start();

    //    $_SESSION["mail_utilisateur"] = ["id" => $user["id"],       
    //    "mdp_utilisateur" => $user["mdp_utilisateur"],
    //    ];
    //    echo($_SESSION);

    
    //  }  




?>