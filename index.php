<?php
// Appel de mes contrôleurs
require_once "controleurs/ControleurProduit.php";
// appel au contrôleur utilisateur
require_once "controleurs/ControleurUtilisateur.php";
// appel au contrôleur pour la gestion des utilisateurs par admin
require_once "controleurs/Admin/GestionUtilisateurs.php";
//ajout contrôleur pour la gestion des événements
require_once "controleurs/Admin/ContrôleurEvevenements.php";
//ajout contrôleur de contrôleur du panier
require_once "controleurs/Admin/GestionPanier.php";


// initialisation de la session
session_start();
$_SESSION;

// Définition de la constante URL, qui permet de rappeller la racine du site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// J'instancie mes contrôleur
$articleController = new ControleurProduit;
// controleur utilisateur 
$userController = new ControleurUtilisateur;
// controleur de gestion des utilisateurs par admin 
$adminUserController = new ControleurUtilisateurs;
// controleur des évènements par admin 
$adminEventController = new ControleurEvenements;
// controleur du panier 
$panierController = new ControleurPanier;


// try catch permet de gérer les erreurs
try {
    if (isset($_GET['page'])) {

        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    }
    // si GET page est vide on redirige vers l'accueil
    if (empty($url[0])) {
        // $articleController->displayArticles();
        require "vues/Essai.php";
    } else {
        //switch de GET page pour savoir vers quelle page renvoyer l'utilisateur 
        switch ($url[0]) {

                //------- interface du site -------//
                // retour à l'accueil //             
            case "retour à l'accueil":
                $userController->accueil();
                break;

                // vers la page musique //    
            case "musique":
                $userController->musique();
                break;

                // vers la page connexion //    
            case "connexion":
                $userController->formConnect();
                break;

                // vers la page d'inscription //    
            case "inscription":
                $userController->formInscript();
                break;

                // vers la page contact //    
            case "contact":
                $userController->contact();
                break;

                // inscription de l'utilisateur validé //    
            case 'inscriptionValid':
                $userController->inscription();
                break;

                // connexion utilisateur validé //    
            case "connexion_valid":
                $userController->connectionUtilisateur();

                // profile utilisateur //    
            case 'profileUtilisateur':
                $userController->profileUtilisateur();
                break;

                // modification du profile utilisateur //    
            case 'modifier le compte':
                $userController->update();
                break;

                // suppression du profile utilisateur //    
            case 'supprimer mon compte':
                $userController->suppressionCompte($_SESSION['id_utilisateur']);
                break;

                // déconnection utilisateur //    
            case 'deconnexion':
                $userController->deconnexion();
                break;

                //----------- Administrateur --------//                  
            case 'gererSite':
                $userController->voirSite();
                break;

                //--------------- gestion les produits par Administrateur ---------//
                // affichage des produits par l'Administrateur //         
            case 'lesProduits':
                $articleController->listeProdAdmin();
                break;

                // vue d'un produit par l'Administrateur //
            case 'voir':
                if ($_SESSION['mail_utilisateur']) {
                    if ($url[1] == 'produit') {
                        $articleController->voirUnProduitAdm($url[2]);
                        break;
                    }
                }

                // ajout d'un produit par l'Administrateur //    
            case 'ajouter':
                if ($_SESSION['mail_utilisateur']) {
                    if ($url[1] == 'produit') {
                        $articleController->ajouterUnProduitAdm();
                        break;
                    }
                }
                // création d'un produit par l'Administrateur //    
            case 'creationProduit':
                $articleController->creationProduit();
                break;

                // modification d'un produit par l'Administrateur //    
            case 'modifier':
                if ($_SESSION['mail_utilisateur']) {
                    if ($url[1] == 'article') {
                        $articleController->editerProduitAdm($url[2]);
                        break;
                    }
                    if ($url[1] == 'editer') {
                        $articleController->miseAjourProduit($url[2]);
                    }
                    break;
                }

                // suppression d'un produit par l'Administrateur //
            case 'supprimer':
                if ($_SESSION['mail_utilisateur']) {
                    if ($url[1] == 'produit') {
                        $articleController->suprimerProduitAdm($url[2]);
                        break;
                    }
                }
                //--------------- gestion des utilisateurs par Administrateur ---------//      


                // listes des utilisateurs //                 
            case 'lesUtilisateurs':
                $adminUserController->listeUtilAdm();
                break;

                // ajout d'un membre par l'administrateur //               
            case "inscription-utilisateur":
                $adminUserController->ajoutUtilAdm();
                break;
            case "ajout-utilisateur":
                $adminUserController->AdminAjouUtil();
                break;

                // modifier un utilisateur //
            case 'modif':
                if ($_SESSION['mail_utilisateur']) {
                    if ($url[1] == 'utilisateur') {
                        $adminUserController->modifierUtilAdm($url[2]);
                        break;
                    }
                    if ($url[1] == 'editeUtilisateur') {
                        $adminUserController->miseAjourUtilAdmin($url[2]);
                    }
                    break;
                }

                // suppression d'un utilisateur //    
            case 'suppr':
                if ($_SESSION['mail_utilisateur']) {
                    if ($url[1] == 'utilisateur') {
                        $adminUserController->supprimerUtilAdmin($url[2]);
                        break;
                    }
                }

                //----------------- gestion des évènements par Administrateur ---------//
                // listes des évènements //
            case 'lesEvenements':
                $adminEventController->listeEvenAdm();
                break;
                // ajout d'un évènement //    
            case 'ajouterEvenement':
                $adminEventController->ajoutEvenAdm();
                break;
                // voir un évènement //
            case 'voirEvenement':
                $adminEventController->voirEvenAdm($url[1]);
                break;

                // modifier un évènement //    
            case 'modifierEvenement':
                if ($_SESSION['mail_utilisateur']) {
                    if ($url[1] == 'evenement') {
                        $adminEventController->modifierEvenAdm($url[2]);
                        break;
                    }
                }
                // suppression d'un évènement //
            case 'supprimerEvenement':
                if ($_SESSION['mail_utilisateur']) {
                    $adminEventController->supprimerEvenAdm($url[1]);
                    break;
                }



                //----------------- gestion du panier ---------//    

                //     // suppression d'un article du panier //
            case 'supprimerArticle':
                $panierController->supprimerArticle($url[1]);
                break;

                // vider le panier //
            case 'viderPanier':
                $panierController->viderPanier();
                break;

                // afficher le panier //
            case 'afficherPanier':
                if ($_SESSION['mail_utilisateur']) {
                    $panierController->afficherPanier();
                    break;
                }



            default:
                // throw new Exception("La page n'existe pas");
                require('vues/404.php');
        }
    }
} catch (Exception $e) {

    echo $e->getMessage();

    //  require "views/error.view.php";
}
