<?php
require_once "controleurs/connectionBdd.php";
require_once "modeles/Admin/GestionUtilisateurs.php";




class ControleurUtilisateurs
{

    // liste les utilisateurs //
    public function  listeUtilAdm()
    {
        include "controleurs/connectionBdd.php";

        $result = Utilisateurs::listeMembres($bdd);
        require "vues/listeUtilisateursAdmin.php";
    }


    public function ajoutUtilAdm()
    {
        require "vues/AjourUtilAdmin.php";
    }

    // inscription utilisateur //
    public function AdminAjouUtil()
    {
        include "controleurs/connectionBdd.php";
        if (
            isset($_POST['nom_utilisateur']) && isset($_POST['prenom_utilisateur']) && isset($_POST['mail_utilisateur'])
            && isset($_POST['addresse_utilisateur']) && isset($_POST['mdp_utilisateur']) && isset($_POST['confirmer_mdp_utilisateur']) && isset($_POST['id_droit'])
        ) {

            if ($_POST['mdp_utilisateur'] == $_POST['confirmer_mdp_utilisateur']) {

                // on test si le mail est correct //
                if (!filter_var($_POST['mail_utilisateur'], FILTER_VALIDATE_EMAIL)) {
                    // die('L\'adresse email est incorrecte');
                    echo "<script language=javascript> alert('L\'adresse email est incorrecte');
                    document.location='lesUtilisateurs';
                    </script>";
                    die;
                }

                // injection des valeurs utilisateur dans la basse de donnee //
                $newuser = new Utilisateurs();
                $newuser->setNomUtilisateur(htmlspecialchars($_POST['nom_utilisateur']));
                $newuser->setPrenomUtilisateur(htmlspecialchars($_POST['prenom_utilisateur']));
                $newuser->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
                $newuser->setAddresseUtilisateur(htmlspecialchars($_POST['addresse_utilisateur']));
                $newuser->setMdpUtilisateur(htmlspecialchars($_POST['mdp_utilisateur']));
                $newuser->setIdDroit(htmlspecialchars($_POST['id_droit']));
                // scripter le mot de passe //
                $newuser->cryptMdp();
                $newuser->AjoutUtilisateur($bdd);
            } else {

                echo '<p>pb de création</p>';
            }
        }
        require "vues/AjourUtilAdmin.php";
    }


    public function modifierUtilAdm($id_utilisateur)
    {
        include('controleurs/connectionBdd.php');

        if ($id_utilisateur) {
            $id_utilisateur1 = strip_tags($id_utilisateur);
            $newsuser =  new Utilisateurs();
            $newsuser->setIdUtiliateur(htmlspecialchars($id_utilisateur1));
            $newsuser->voirUtilisateurAdmin($bdd);
            require 'vues/miseAjourUtilAdmin.php';
        } else {
            echo $_SESSION['error'] = "probleme de modification de l'utilisateur";
            header("Location: lesProduits");
            die();
        }
    }


    // mise a jour utilisateur //
    public function miseAjourUtilAdmin($id_utilisateur)
    {
        include "controleurs/connectionBdd.php";
        require 'vues/miseAjourUtilAdmin.php';
        if ($id_utilisateur) {
            $id = intval($id_utilisateur);
            if (
                isset($_POST['nom_utilisateur']) && isset($_POST['prenom_utilisateur']) && isset($_POST['mail_utilisateur'])
                && isset($_POST['addresse_utilisateur']) && isset($_POST['id_droit'])
            ) {
                $newuser = new Utilisateurs();
                $newuser->setIdUtiliateur(htmlspecialchars($id));
                $newuser->setNomUtilisateur(htmlspecialchars($_POST['nom_utilisateur']));
                $newuser->setPrenomUtilisateur(htmlspecialchars($_POST['prenom_utilisateur']));
                $newuser->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
                $newuser->setAddresseUtilisateur(htmlspecialchars($_POST['addresse_utilisateur']));
                $newuser->setIdDroit(htmlspecialchars($_POST['id_droit']));
                $newuser->miseAjourUtilAdmin($bdd);
                header("location:" . URL . "lesUtilisateurs");
            }
        }
    }



    // suppression d'un article //
    public function supprimerUtilAdmin($id_utilisateur)
    {
        include('controleurs/connectionBdd.php');
        if ($id_utilisateur) {

            $newsUtilisateurs = new Utilisateurs();
            $newsUtilisateurs->setIdUtiliateur(htmlspecialchars($id_utilisateur));
            $newsUtilisateurs->suppressionUtilAdmin($bdd);
            header("Location: " . URL . "lesUtilisateurs");
        } else {
            $_SESSION['error'] = "problème de suppression";
            header("Location: " . URL . "lesUtilisateurs");
        }
    }

   
}
