<?php

class Utilisateur
{

    // mes attributs de mon modèle //
    private $id_utilisateur;
    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $mail_utilisateur;
    // private $telephone_utilisateur;
    private $addresse_utilisateur;
    private $mdp_utilisateur;
    private $confirmer_mdp_utilisateur;
    private $id_droit;

    // mes getters //
    public function __construct()
    {
    }

    //id_utilisateur Getter and Setter //
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }
    public function setIdUtiliateur($nouveau_user)
    {
        $this->id_utilisateur = $nouveau_user;
    }

    //nom_utilisateur Getter and Setter //
    public function getNomUtilisateur()
    {
        return $this->nom_utilisateur;
    }
    public function setNomUtilisateur($nouveau_nom)
    {
        $this->nom_utilisateur = $nouveau_nom;
    }

    // prenom_utilisateur Getter and Setter //
    public function getPrenomUtilisateur()
    {
        return $this->prenom_utilisateur;
    }
    public function setPrenomUtilisateur($nouveau_prenom)
    {
        $this->prenom_utilisateur = $nouveau_prenom;
    }

    // mail_utilisateur Getter and Setter//
    public function getMailUtilisateur()
    {
        return $this->mail_utilisateur;
    }
    public function setMailUtilisateur($nouveau_mail)
    {
        $this->mail_utilisateur = $nouveau_mail;
    }

    //telephone_utilisateur Getter and Setter //
    //  public function getTelephoneUtilisateur()
    //  {
    //      return $this->telephone_utilisateur;
    //  }
    //  public function setTelephoneUtilisateur($nouveau_telephone)
    //  {
    //      $this->telephone_utilisateur = $nouveau_telephone;
    //  }

    //addresse_utilisateur Getter and Setter //
    public function getAddresseUtilisateur()
    {
        return $this->addresse_utilisateur;
    }
    public function setAddresseUtilisateur($nouvelle_addresse)
    {
        $this->addresse_utilisateur = $nouvelle_addresse;
    }

    //mdp_utilisateur Getter and Setter //
    public function getMdpUtilisateur()
    {
        return $this->mdp_utilisateur;
    }
    public function setMdpUtilisateur($nouveau_mdp)
    {
        $this->mdp_utilisateur = $nouveau_mdp;
    }

    // confirmation mdp utilisateur Getter and Setter //

    public function getConfirmationMdpUtilisateur()
    {
        return $this->confirmer_mdp_utilisateur;
    }
    public function setConfirmationMdpUtilisateur($confirmation_mdp)
    {
        $this->confirmer_mdp_utilisateur = $confirmation_mdp;
    }

    // droit utilisateur //
    public function getIdDroit()
    {
        return $this->id_droit;
    }

    // id_droit Setter //
    public function setIdDroit($id_droit)
    {
        $this->id_droit = $id_droit;

        return $this;
    }





    /*-----------------------------------------------------
                     Fonctions :
 -----------------------------------------------------*/


    //methode hashage d'un mot de mot de passe :
    public function cryptMdp()
    {
        $this->setMdpUtilisateur(password_hash($this->getMdpUtilisateur(), PASSWORD_DEFAULT));
    }

    // méthode de suppression des caractère spécieaux //
    public function deleteXSS($string)
    {
        $string = strip_tags($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    //création d'un utilisateur //
    public function creationUtilisateur($bdd)
    {   // on recupère les données du formulaire par les gets //
        $nom_utilisateur = $this->getNomUtilisateur();
        $prenom_utilisateur = $this->getPrenomUtilisateur();
        $mail_utilisateur = $this->getMailUtilisateur();
        $addresse_utilisateur = $this->getAddresseUtilisateur();
        $mdp_utilisateur = $this->getMdpUtilisateur();
        $id_droit = 1;
        try {
            //avant de réaliser la requête, on vérifie si le mail n'est pas déjà utilisé //
            $req = $bdd->prepare("SELECT mail_utilisateur FROM utilisateur WHERE mail_utilisateur = :mail_utilisateur");
            $req->execute(array('mail_utilisateur' => $mail_utilisateur));
            $mail_utilisateur_existe = $req->rowCount();
            //si le mail n'existe pas, on peut créer l'utilisateur //
            if ($mail_utilisateur_existe == 0) {
                // on passe par une requête préparée pour éviter les injections SQL //
                $req = $bdd->prepare("INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, mail_utilisateur, addresse_utilisateur, mdp_utilisateur, id_droit) VALUE (:nom_utilisateur, :prenom_utilisateur, :mail_utilisateur, :addresse_utilisateur, :mdp_utilisateur, :id_droit)");
                $req->execute(array(
                    'nom_utilisateur' => $nom_utilisateur,
                    'prenom_utilisateur' => $prenom_utilisateur,
                    'mail_utilisateur' => $mail_utilisateur,
                    'addresse_utilisateur' => $addresse_utilisateur,
                    'mdp_utilisateur' => $mdp_utilisateur,
                    'id_droit' => $id_droit
                ));
            } else {
                // alert d'erreur  et redirige vers la page inscription //
                throw new Exception("<script language=javascript> alert('Ce mail est déjà utilisé !'); 
                document.location='inscription';
                </script>");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    public function connectionUtilisateur($bdd)
    {
        // on récupère grâce au guetteur les données de l'utilisateur //
        $mail_utilisateur = $this->getMailUtilisateur();
        $mdp_utilisateur = $this->getMdpUtilisateur();

        try {
            $sql = $bdd->prepare("SELECT * FROM utilisateur WHERE mail_utilisateur = :mail_utilisateur");
            $sql->execute([
                'mail_utilisateur' => $mail_utilisateur
            ]);
            // on récupère les données de la requête //
            $data = $sql->fetch();
            // on vérifie dans data si les valeurs mail correspondent //
            if ($data != false) {
                // on vérifie si le mot de passe correspond et le mail //
                if (password_verify($mdp_utilisateur, $data['mdp_utilisateur']) && $mail_utilisateur == $data['mail_utilisateur']) {
                    // on crée une session pour l'utilisateur //
                    $_SESSION['id_droit'] = $data['id_droit'];
                    $_SESSION['id_utilisateur'] = $data['id_utilisateur'];
                    $_SESSION['nom_utilisateur'] = $data['nom_utilisateur'];
                    $_SESSION['prenom_utilisateur'] = $data['prenom_utilisateur'];
                    $_SESSION['mail_utilisateur'] = $data['mail_utilisateur'];
                    $_SESSION['addresse_utilisateur']   = $data['addresse_utilisateur'];
                    $_SESSION['mdp_utilisateur'] = $data['mdp_utilisateur'];
                    // on redirige vers la page d'accueil //
                    if ($data['id_droit'] == 2 || $data['id_droit'] == 1) {
                        header('location:' . URL);
                        die();
                    }
                } else {
                    $_SESSION['error'] = "identifiant incorrect";
                    header('location: connexion');
                }
            } else {
                // si les données ne correspondent pas, on affiche une erreur //
                throw new Exception("<script language=javascript> alert('compte non existant !');
                document.location='connexion';
                </script>");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    // update utilisateur //
    public function update($bdd)
    {
        $nom_utilisateur = $this->getNomUtilisateur();
        $prenom_utilisateur = $this->getPrenomUtilisateur();
        $mail_utilisateur = $this->getMailUtilisateur();
        $addresse_utilisateur = $this->getAddresseUtilisateur();
        $id = $this->getIdUtilisateur();
        try {
            // on passe par une requête préparée pour éviter les injections SQL //
            $sql = $bdd->prepare("UPDATE utilisateur SET nom_utilisateur = :nom_utilisateur, prenom_utilisateur = :prenom_utilisateur, mail_utilisateur = :mail_utilisateur, addresse_utilisateur = :addresse_utilisateur WHERE id_utilisateur = :id_utilisateur");
            $sql->execute([
                'nom_utilisateur' => $nom_utilisateur,
                'prenom_utilisateur' => $prenom_utilisateur,
                'mail_utilisateur' => $mail_utilisateur,
                'addresse_utilisateur' => $addresse_utilisateur,
                'id_utilisateur' => $id
            ]);
            //si la requête n'a pas abouti, on affiche un message d'erreur //
            if ($sql->rowCount() == 0) {
                // on affiche un message d'erreur redirige vers la page d'accueil //
                throw new Exception("<script language=javascript> alert('Erreur lors de la modification');
                document.location='profileUtilisateur';
                </script>");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    // update mot de passe //
    public function UpdateMdp($bdd)
    {
        $id = $this->getIdUtilisateur();
        $mdp_utilisateur = $this->getMdpUtilisateur();
        // on passe par une requête préparée pour éviter les injections SQL //
        try {
            $sql = $bdd->prepare("UPDATE utilisateur set mdp_utilisateur = ':mdp_utilisateur' WHERE id_utilisateur = ':id'");
            $result = $sql->execute([
                'mdp_utilisateur' => $mdp_utilisateur,
                'id' => $id
            ]);
            // si la requête a abouti, on affiche un message de succès //
            if ($result) {
                $_SESSION['message'] = "Le mot de passe à été mise à jour";
                header("Location: profileUtilisateur");
            } else {
                // sinon on affiche un message d'erreur //
                throw new Exception("<script language=javascript> alert('Erreur lors de la modification');
                document.location='profileUtilisateur';
                </script>");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    // delete utilisateur //
    public function delete($bdd)
    {   // on récupère grace au getter les données de l'utilisateur //
        $id = $this->getIdUtilisateur();
        // on passe par une requête préparée pour éviter les injections SQL et try_catch //
        try {
            $sql = $bdd->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $result = $sql->execute(array('id_utilisateur' => $id));
            if ($result) {
                // si la requête est ok on supprime la session //
                session_unset();
                session_destroy();
                // on redirige vers la page d'accueil //
                throw new Exception("<script language=javascript> alert('Votre compte à été supprimé');
                document.location='retour à l\'accueil';
                </script>");
                exit();
            } else {
                // sinon on affiche un message d'erreur //
                throw new Exception("<script language=javascript> alert('Erreur lors de la suppression');
                document.location='retour à l\'accueil';
                </script>");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
