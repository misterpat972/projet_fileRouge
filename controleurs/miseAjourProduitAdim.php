<?php

include('../controleurs/connectionBdd.php');
// include('../modeles/classeProduit.php');
include('../controleurs/voirUnProduitAdmin.php');


if (isset($_POST['modifier'])) {
    if ($_GET['id'] && !empty($_GET['id'])) {

        if (isset($_POST['nom_produit']) && isset($_POST['description_produit']) && isset($_POST['prix_produit'])) {
            if (!empty($_POST['nom_produit']) &&  !empty($_POST['description_produit']) && !empty($_POST['prix_produit'])) {

                if (isset($_FILES['img_produit']) && $_FILES['img_produit']['error'] == 0) {
                    $error = 1;
                    if ($_FILES['img_produit']['size'] <= 5000000) {
                        $infoimages = pathinfo($_FILES['img_produit']['name']);
                        $extentionImages = $infoimages['extension'];
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


                $id_produit1 = strip_tags($_GET['id']);

                $newsproduit =  new Produit();
                // $newsproduit->setId_produit($id_produit1);
                $newsproduit->setId_produit(htmlspecialchars($id_produit1));
                $newsproduit->setNom_produit(htmlspecialchars($_POST['nom_produit']));;
                $newsproduit->setDescription_produit(htmlspecialchars($_POST['description_produit']));
                $newsproduit->setPrix_produit(htmlspecialchars($_POST['prix_produit']));
                $newsproduit->setImg_produit(htmlspecialchars($addresse));
                $newsproduit->miseAjourProduit($bdd);
            } else {
                echo "<p>les champs doivent être remplis</p>";
            }
        }
    } else {

        echo  $_SESSION['error'] = "vous avez pas le doit de voir l'article";
        //  header("Location: ../vues/listeProduitsAdmin.php");
    }
}
