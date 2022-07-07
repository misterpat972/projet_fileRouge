<?php


class Utilisateurs extends Utilisateur
{

  /**
   * @return Utilisateurs[]
   */
  public static function listeMembres($bdd): array
  {
    $sql = $bdd->prepare("SELECT * FROM `utilisateur` INNER JOIN droit_utilisateur ON utilisateur.id_droit = droit_utilisateur.id_droit ");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }


  //création d'un utilisateur //
  public function AjoutUtilisateur($bdd)
  {
    $nom_utilisateur = $this->getNomUtilisateur();
    $prenom_utilisateur = $this->getPrenomUtilisateur();
    $mail_utilisateur = $this->getMailUtilisateur();
    $addresse_utilisateur = $this->getAddresseUtilisateur();
    $mdp_utilisateur = $this->getMdpUtilisateur();
    $id_droit = $this->getIdDroit();

    try {

      // on test si le mail est deja existant //
      $req = $bdd->prepare("SELECT * FROM utilisateur WHERE mail_utilisateur = :mail_utilisateur");
      $req->execute(array('mail_utilisateur' => $this->getMailUtilisateur()));
      $test_mail = $req->fetch();
      if ($test_mail) {
        // si le mail existe on affiche un message d'erreur //      
        echo "<script language=javascript> alert('Ce mail est déjà utilisé');
            document.location='lesUtilisateurs';
            </script>";
        die;
      }
      // on enregistre l'utilisateur //
      $req = $bdd->prepare("INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, mail_utilisateur, addresse_utilisateur, mdp_utilisateur, id_droit) VALUE (:nom_utilisateur, :prenom_utilisateur, :mail_utilisateur, :addresse_utilisateur, :mdp_utilisateur, :id_droit)");
      $req->execute(array(
        'nom_utilisateur' => $nom_utilisateur,
        'prenom_utilisateur' => $prenom_utilisateur,
        'mail_utilisateur' => $mail_utilisateur,
        'addresse_utilisateur' => $addresse_utilisateur,
        'mdp_utilisateur' => $mdp_utilisateur,
        'id_droit' => $id_droit
      ));

      $_SESSION['message'] = 'compte crée avec succes';
      echo "<script language=javascript> alert('Création compte validée. Bienvenue !'); 
        document.location='lesUtilisateurs';
        </script>";
    } catch (Exception $e) {
      die('erreur :' . $e->getMessage());
    }
  }

  // voir les utilisateurs par l'admin //
  public function voirUtilisateurAdmin($bdd)
  {

    $id_utilisateur = $this->getIdUtilisateur();

    $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
    $data = $bdd->prepare($sql);
    $data->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $data->execute();
    $resultat = $data->fetchAll();
    if ($resultat > 0) {
      foreach ($resultat as $row) {
        $_SESSION['id_utilisateur'] = $row['id_utilisateur'];
        $_SESSION['nom_utilisateur']  = $row['nom_utilisateur'];
        $_SESSION['prenom_utilisateur']  = $row['prenom_utilisateur'];
        $_SESSION['mail_utilisateur'] = $row['mail_utilisateur'];
        $_SESSION['addresse_utilisateur'] = $row['addresse_utilisateur'];
      }
      if (!$resultat) {
        $_SESSION['message'] = "produit non trouvée";
        header('location: lesUtilisateurs');
      }
    }
  }

  // mise a jour utilisateur //
  public function miseAjourUtilAdmin($bdd)
  {

    $id = $this->getIdUtilisateur();
    $nom_utilisateur = $this->getNomUtilisateur();
    $prenom_utilisateur = $this->getPrenomUtilisateur();
    $mail_utilisateur = $this->getMailUtilisateur();
    $addresse_utilisateur = $this->getAddresseUtilisateur();
    $id_droit = $this->getIdDroit();

    $sql = $bdd->prepare("UPDATE utilisateur set nom_utilisateur = :nom_utilisateur, prenom_utilisateur = :prenom_utilisateur, mail_utilisateur = :mail_utilisateur, addresse_utilisateur = :addresse_utilisateur, id_droit = :id_droit WHERE id_utilisateur = :id_utilisateur");
    $result = $sql->execute([
      'nom_utilisateur' => $nom_utilisateur,
      'prenom_utilisateur' => $prenom_utilisateur,
      'mail_utilisateur' => $mail_utilisateur,
      'addresse_utilisateur' => $addresse_utilisateur,
      'id_droit' => $id_droit,
      'id_utilisateur' => $id
    ]);
    if ($result) {
      // echo '<script type="text/javascript">alert(" Le compte à été mise à jour");
      // document.location="../vues/profileUtilisateurConnecte.php";
      // </script>';
      $_SESSION['message'] = "Le compte à été mise à jour";
      // header("location: lesUtilisateurs" );   
    }
  }
  // supprimer un utilisateur par l'admin // 
  public function suppressionUtilAdmin($bdd)
  {
    $id_utilisateur = $this->getIdUtilisateur();
    $sql = $bdd->prepare("DELETE  FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
    $result = $sql->execute(['id_utilisateur' => $id_utilisateur]);
    if ($result) {
      $_SESSION['message'] = "utilisateur bien supprimé";
    } else {
      $_SESSION['error'] = "problème de suppression";
    }
  }
}
