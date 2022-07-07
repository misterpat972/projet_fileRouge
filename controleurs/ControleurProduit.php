<?php


include_once('modeles/classeProduit.php');

class ControleurProduit
{

    ////////////////////////////////////
    //                                //  
    //        mes vues               //
    //                              //              
    //                             // 
    ////////////////////////////////

    // affichage de la liste des produits
    public function listeProdAdmin()
    {
        include('controleurs/connectionBdd.php');
        $lesproduits = Produit::sowProduct($bdd);
        require "vues/listeProduitsAdmin.php";
    }

    // ajout d'un produit
    public function ajouterUnProduitAdm()
    {
        require "vues/formulaireArticleAdmin.php";
    }


    ////////////////////////////////////
    //                                //  
    //        mes fonctions          //
    //                              //              
    //                             // 
    ////////////////////////////////



    // voir un produit // 
    public function voirUnProduitAdm($id_produit)
    {   // on récupère la connection à la base de données
        include('controleurs/connectionBdd.php');

        if ($id_produit) {
            // récupération du produit par l'id
            $id_produit1 = strip_tags($id_produit);
            // j'instancie un nouveau produit
            $newsproduit = new Produit();
            // je sette l'id du produit
            $newsproduit->setId_produit($id_produit1);
            // j'appelle la fonction qui récupère le produit par l'id
            $newsproduit->voirUnProduitAdm($bdd);
        } else {
            $_SESSION['message'] = "vous avez pas le doit de voir l'article";
            header("Location:"  . URL);
        }
        require 'vues/voirUnProduitAdmin.php';
    }


    // creer un un article //
    public function creationProduit()
    {   // on récupère la connection à la base de données
        include('controleurs/connectionBdd.php');
        // on verifie si le formulaire est bien rempli et pas vide
        if (isset($_POST['nom_produit']) &&  !empty($_POST['nom_produit']) &&  isset($_POST['description_produit']) &&  !empty($_POST['description_produit'])  && isset($_POST['prix_produit'])   && !empty($_POST['prix_produit']) && isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])) {
            // on verifie lque l'image est présente
            if (isset($_FILES['img_produit']) && $_FILES['img_produit']['error'] == 0) {
                $error = 1;
                // on verifie la taille de l'image                
                if ($_FILES['img_produit']['size'] <= 5000000) {
                    $infoimages = pathinfo($_FILES['img_produit']['name']);
                    // on verifie l'extension de l'image
                    $extentionImages = $infoimages['extension'];
                    // on verifie si l'extention est autorisée
                    $tabextension = array('png', 'jpg', 'jpeg', 'gif');
                    // on verifie si l'extention est dans le tableau
                    if (in_array($extentionImages, $tabextension)) {
                        $addresse = './imageProduit/' . time() . rand();
                        // on déplace l'image dans le dossier imageProduit
                        move_uploaded_file($_FILES['img_produit']['tmp_name'], $addresse);
                        ('./imageProduit/' . time() . rand() . '.' . $extentionImages);
                        $error = 0;
                    }
                }
            }
            // on verifie si il y a une erreur
            $newsproduit = new Produit();
            $newsproduit->setNom_Produit(htmlspecialchars($_POST['nom_produit']));
            $newsproduit->setDescription_Produit(htmlspecialchars($_POST['description_produit']));
            $newsproduit->setPrix_Produit(htmlspecialchars($_POST['prix_produit']));
            $newsproduit->setImg_Produit(htmlspecialchars($addresse));
            $newsproduit->setId_categorie(htmlspecialchars($_POST['id_categorie']));
            $newsproduit->créationProduit($bdd);

            $_SESSION['message'] = "Article crée avec succes";
            header("Location:lesProduits");
        } else {
            echo $_SESSION['error'] = "Vous devez remplir tout les champs";
            header("Location: lesProduits");
            die();
        }
    }


    // voir un produit on select le prod par l'id  //
    public function editerProduitAdm($id_produit)
    {   // on récupère la connection à la base de données
        include('controleurs/connectionBdd.php');
        // on récupère le produit par l'id
        if ($id_produit) {
            // on passe un strip_tags pour supprimer les caractères non autorisés
            $id_produit1 = strip_tags($id_produit);
            // on instancie un nouveau produit
            $newsproduit =  new Produit();
            // on sette l'id du produit
            $newsproduit->setId_produit(htmlspecialchars($id_produit1));
            // on appelle la fonction qui récupère le produit par l'id
            $newsproduit->voirUnProduitAdm($bdd);
            require 'vues/miseAjourProduitAdm.php';
            // header("Location: ".URL."lesProduits");
        } else {
            echo $_SESSION['error'] = "probleme d'édition du produit";
            header("Location: lesProduits");
            die();
        }
    }

    // après chargement des inputs on fait la mise à jour //
    public function miseAjourProduit($id_produit)
    {   // on récupère la connection à la base de données //
        include('controleurs/connectionBdd.php');
        // on récupère la vue //
        require './vues/miseAjourProduitAdm.php';
        // on effectue un intval pour convertir en intier si jamais //
        $id_produit1  =  intval($id_produit);
        if ($id_produit1) {
            // on vérifie si le formulaire est bien rempli et pas vide //
            if (isset($_POST['nom_produit']) && isset($_POST['description_produit']) && isset($_POST['prix_produit']) && isset($_POST['id_categorie'])) {
                if (empty(!$_POST['nom_produit']) &&  empty(!$_POST['description_produit']) && empty(!$_POST['prix_produit']) && empty(!$_POST['id_categorie'])) {
                    // on verifie lque l'image est présente //
                    if (isset($_FILES['img_produit']) && $_FILES['img_produit']['error'] == 0) {
                        $error = 1;
                        if ($_FILES['img_produit']['size'] <= 5000000) {
                            $infoimages = pathinfo($_FILES['img_produit']['name']);
                            $extentionImages = $infoimages['extension'];
                            // on verifie extention  //
                            $tabextension = array('png', 'jpg', 'jpeg', 'gif');
                            if (in_array($extentionImages, $tabextension)) {
                                $addresse = './imageProduit/' . time() . rand();
                                move_uploaded_file($_FILES['img_produit']['tmp_name'], $addresse);
                                $error = 0;
                            }
                        } else {

                            echo  $_SESSION['error'] = "Veuillez entrez une image plus petite";
                        }
                    } else {

                        echo  $_SESSION['error'] = "impossible de charger l'image";
                    }
                    // on effectue un strip_tags pour supprimer les caractères non autorisés //
                    $id = strip_tags($id_produit1);
                    // on instancie un nouveau produit //
                    $newsproduit =  new Produit();
                    // on vient setter les valeurs //
                    $newsproduit->setId_produit(htmlspecialchars($id));
                    $newsproduit->setNom_produit(htmlspecialchars($_POST['nom_produit']));;
                    $newsproduit->setDescription_produit(htmlspecialchars($_POST['description_produit']));
                    $newsproduit->setPrix_produit(htmlspecialchars($_POST['prix_produit']));
                    $newsproduit->setImg_produit(htmlspecialchars($addresse));
                    $newsproduit->setId_categorie(htmlspecialchars($_POST['id_categorie']));
                    $newsproduit->miseAjourProduit($bdd);
                    // on redirige vers la page des produits //
                    header("Location: " . URL . "lesProduits");
                } else {
                    echo "<p>les champs doivent être remplis</p>";
                }
            } else {
                echo  $_SESSION['error'] = "vous avez pas le doit de voir l'article";
                //  header("Location: lesProduits");
            }
        }
    }


    // suppression d'un article //

    public function suprimerProduitAdm($id_produit)
    {
        include('controleurs/connectionBdd.php');


        if ($id_produit) {
            // on instancie un nouveau produit //
            $newsproduit = new Produit();
            // on sette l'id du produit //
            $newsproduit->setId_produit(htmlspecialchars($id_produit));
            // on appelle la fonction qui supprime le produit par l'id //
            $newsproduit->suppressionProduit($bdd);
            header("Location: " . URL . "lesProduits");
        } else {
            $_SESSION['error'] = "problème de suppression";
        }
    }
}
