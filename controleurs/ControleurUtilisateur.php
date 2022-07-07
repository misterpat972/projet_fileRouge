<?php
// on inclut le fichier modèle contenant la classe Utilisateur
require_once "modeles/utilisateur.php";
// on inclut le fichier contenant la connection à la base de données
require_once "controleurs/connectionBdd.php";


class ControleurUtilisateur
{
    // vers la page musique //
    public function musique()
    {   // on récupère la connection à la base de données
        include "controleurs/connectionBdd.php";
        // récupération de tous les produits
        $lesproduits = Produit::sowProduct($bdd);
        require "vues/Musique.php";

        //si on clique sur le bouton "ajouter au panier" dans la page musique //
        if (isset($_POST['ajouterArticle'])) {
            if (isset($_SESSION['panier'])) {
                $item_array = array(
                    'id_produit' => $_POST['id_produit'],
                    'nom_produit' => $_POST['nom_produit'],
                    'description_produit' => $_POST['description_produit'],
                    'prix_produit' => $_POST['prix_produit'],
                    'img_produit' => $_POST['img_produit'],
                    'quantite' => $_POST['quantite']
                );
                array_push($_SESSION['panier'], $item_array);
                // return $_SESSION['panier'];
                echo '<script>alert("Article ajouté au panier")
                            window.location.href="musique"</script>';
            } else {
                $item_array = array(
                    'id_produit' => $_POST['id_produit'],
                    'nom_produit' => $_POST['nom_produit'],
                    'description_produit' => $_POST['description_produit'],
                    'prix_produit' => $_POST['prix_produit'],
                    'img_produit' => $_POST['img_produit'],
                    'quantite' => $_POST['quantite']
                );
                $_SESSION['panier'][0] = $item_array;
                // si tout est ok on redirige vers la page panier
                echo '<script>alert("Article ajouté au panier")</script>';
                //  header("location:musique");  
            }
        }
    }

    // vers la page formulaire de connection //
    public function formConnect()
    {
        require "vues/formulaireConnection.php";
    }

    // vers la page formulaire d' inscription //
    public function formInscript()
    {
        require "vues/formulaireInscription.php";
    }

    // vers la page contact //
    public function contact()
    {
        require "vues/formulaireContact.php";
    }


    // vers le profile Utilisateur //
    public function profileUtilisateur()
    {
        require "vues/profileUtilisateurConnecte.php";
    }


    // vers la gestion du site par les Admin//
    public function voirSite()
    {
        require "vues/donneesAdministrateur.php";
    }


    // vers la page d'accueil //
    public function accueil()
    {
        require "vues/Essai.php";
    }


    // affichage des utilisateurs par l'Administrateur //
    public function  listeUtilAdm()
    {
        require "vues/listeUtilisateursAdmin.php";
    }

    public function ajoutUtilAdm()
    {
        require "vues/miseAjourUtilAdmin.php";
    }

    // inscription utilisateur //
    public function inscription()
    {   // on récupère la connection à la base de données
        include "controleurs/connectionBdd.php";
        if (
            // on verifie que les champs ne sont pas vides //
            isset($_POST['nom_utilisateur']) && !empty($_POST['nom_utilisateur']) &&
            isset($_POST['prenom_utilisateur']) && !empty($_POST['prenom_utilisateur'])
            && isset($_POST['mail_utilisateur']) && !empty($_POST['mail_utilisateur']) &&
            isset($_POST['addresse_utilisateur']) && !empty($_POST['addresse_utilisateur'])
            && isset($_POST['mdp_utilisateur']) && !empty($_POST['mdp_utilisateur']) &&
            isset($_POST['confirmer_mdp_utilisateur']) && !empty($_POST['confirmer_mdp_utilisateur'])
        ) {
            // on verifie que les mots de passe sont identiques //
            if ($_POST['mdp_utilisateur'] == $_POST['confirmer_mdp_utilisateur']) {
                // on test si le mail est correct //
                if (!filter_var($_POST['mail_utilisateur'], FILTER_VALIDATE_EMAIL)) {
                    echo "<script language=javascript> alert('L\'adresse email est incorrecte');
                    window.location.href='inscription'; </script>";
                    die;
                } else {
                    // injection des valeurs utilisateur dans la basse de donnee //
                    $newuser = new Utilisateur();
                    // on récupère les valeurs du formulaire via les setter //
                    $newuser->setNomUtilisateur(htmlspecialchars($_POST['nom_utilisateur']));
                    $newuser->setPrenomUtilisateur(htmlspecialchars($_POST['prenom_utilisateur']));
                    $newuser->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
                    $newuser->setAddresseUtilisateur(htmlspecialchars($_POST['addresse_utilisateur']));
                    $newuser->setMdpUtilisateur(htmlspecialchars($_POST['mdp_utilisateur']));
                    $newuser->setConfirmationMdpUtilisateur(htmlspecialchars($_POST['confirmer_mdp_utilisateur']));
                    // scripter le mot de passe //
                    $newuser->cryptMdp();
                    $newuser->creationUtilisateur($bdd);
                    // alert de confirmation //                  
                    // redirection vers la page d'accueil //
                    echo "<script language=javascript> alert('Création compte validée. Bienvenue !');                 
                     window.location.href='connexion'</script>";
                }
            } else {
                echo "<script language=javascript> alert('Les mots de passe ne sont pas identiques');
                    window.location.href='inscription'; </script>";
                die;
            }
        } else {
            echo "<script language=javascript> alert('Veuillez remplir tous les champs');
            window.location.href='inscription'; </script>";
            die;
        }
    }

    // connection utilisateur //
    public function connectionUtilisateur()
    {   // on test si les champs sont remplis //
        if (
            isset($_POST['mail_utilisateur']) && !empty($_POST['mail_utilisateur'])
            && isset($_POST['mdp_utilisateur']) && !empty($_POST['mdp_utilisateur'])
        ) { // on test si le mail est correct //
            if (filter_var($_POST['mail_utilisateur'], FILTER_VALIDATE_EMAIL)) {
                // on récupère la connection à la base de données //
                include("controleurs/connectionBdd.php");
                // on instancie un nouvel objet utilisateur //
                $Utilisateur = new Utilisateur();
                // on set les valeurs de l'utilisateur //
                $Utilisateur->setMailUtilisateur(htmlspecialchars($_POST['mail_utilisateur']));
                $Utilisateur->setMdpUtilisateur(htmlspecialchars($_POST['mdp_utilisateur']));
                // on appel la fonction de connexion //
                $Utilisateur->connectionUtilisateur($bdd);
            } else {
                // si le mail est incorrect //
                $_SESSION['error'] = "identifiant incorrect";
                header('location: connexion');
            }
        } else {
            // si les champs sont vides //
            echo "<script language=javascript> alert('Veuillez remplir tous les champs'); </script>";
            die;
        }
    }

    // mise à jour Utilisateur //
    public function update()
    {   // on récupère la connection à la base de données //
        include("controleurs/connectionBdd.php");
        if ( // on verifie que les champs sont remplis //
            isset($_POST['nom_utilisateur']) && !empty($_POST['nom_utilisateur']) &&
            isset($_POST['prenom_utilisateur']) && !empty($_POST['prenom_utilisateur']) &&
            isset($_POST['mail_utilisateur']) && !empty($_POST['mail_utilisateur']) &&
            isset($_POST['addresse_utilisateur']) && !empty($_POST['addresse_utilisateur'])
        ) {
            // on passe les valeurs dans des sessions //
            $_SESSION['nom_utilisateur'] = $_POST['nom_utilisateur'];
            $_SESSION['prenom_utilisateur'] = $_POST['prenom_utilisateur'];
            $_SESSION['mail_utilisateur'] = $_POST['mail_utilisateur'];
            $_SESSION['addresse_utilisateur']  = $_POST['addresse_utilisateur'];
            // on instancie un nouvel objet utilisateur //
            $newuser = new Utilisateur();
            // on set les valeurs de l'utilisateur //
            $newuser->setIdUtiliateur($newuser->deleteXSS($_SESSION['id_utilisateur']));
            $newuser->setNomUtilisateur($newuser->deleteXSS($_SESSION['nom_utilisateur']));
            $newuser->setPrenomUtilisateur($newuser->deleteXSS($_SESSION['prenom_utilisateur']));
            $newuser->setMailUtilisateur($newuser->deleteXSS($_SESSION['mail_utilisateur']));
            $newuser->setAddresseUtilisateur($newuser->deleteXSS($_SESSION['addresse_utilisateur']));
            $newuser->update($bdd);
            //si la mise à jour est faite et que le droit utilisateur est égale à 1 alors on redirige vers la page utilisateur //
            if ($_SESSION['id_droit'] == 1) {
                $_SESSION['message'] = "Le compte à été mise à jour";
                header("Location: profileUtilisateur");
                // si le droit utilisateur est égale à 2 alors on redirige vers la page administrateur //
            } elseif ($_SESSION['id_droit'] == 2) {
                $_SESSION['message'] = "Le compte administrateur à été mise à jour";
                header("Location: gererSite");
            }
        } else {
            // si les champs sont vides //
            echo "<script language=javascript> alert('Veuillez remplir tous les champs'); history.back(); </script>";
            die;
        }
    }

    //suppression utilisateur //
    public function suppressionCompte($id_utilisateur)
    {
        include("controleurs/connectionBdd.php");
        // si l'id utilisateur est passé en parametre alors on instancie un nouvelle objet utilisateur //
        if ($id_utilisateur) {
            $newuser = new Utilisateur();
            // on set les valeurs de l'utilisateur //          
            $newuser->setIdUtiliateur($newuser->deleteXSS($id_utilisateur));
            // on appel la fonction de suppression //
            $newuser->delete($bdd);
        }
    }

    // deconnetion utilisateur //
    public function deconnexion()
    {
        session_start();
        // session_unset();
        session_destroy();
        header("Location:" . URL);
        exit();
    }
}
