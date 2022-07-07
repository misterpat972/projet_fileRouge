<?php
// session_start();
include('../controleurs/connectionBdd.php');
include('../modeles/classeProduit.php');

if($_GET['id'] && !empty($_GET['id'])){
    
    $id_produit1 = strip_tags($_GET['id']);

    $newsproduit =  new Produit();
    $newsproduit->setId_produit($id_produit1);
    $newsproduit->voirUnProduitAdm($bdd);

    
}else{
    $_SESSION['message'] = "vous avez pas le doit de voir l'article";
    header("Location: ../vues/Essai.php");
}





?>