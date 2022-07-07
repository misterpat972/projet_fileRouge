
<?php
session_start();
include ('connectionBdd.php');
include ('../modeles/classeProduit.php');


if(isset($_POST['nom_produit']) &&  !empty($_POST['nom_produit']) &&  isset($_POST['description_produit']) &&  !empty($_POST['description_produit'])  && isset($_POST['prix_produit'])   && !empty($_POST['prix_produit'])){
   
    if (isset($_FILES['img_produit']) && $_FILES['img_produit']['error'] == 0){
                $error = 1;

        if($_FILES['img_produit']['size'] <= 5000000){
            $infoimages = pathinfo($_FILES['img_produit']['name']);
            $extentionImages = $infoimages['extension'];
            $tabextension = array('png', 'jpg', 'jpeg', 'gif');

            if(in_array($extentionImages, $tabextension)){

                $addresse = '../imageProduit/'.time().rand();

                move_uploaded_file($_FILES['img_produit']['tmp_name'], $addresse);
                // '../imageProduit/'.time().rand().'.'.$extentionImages);
                  $error = 0;

            }
           
        }
        
       

    }

    $newsproduit = new Produit();
    $newsproduit->setNom_Produit(htmlspecialchars($_POST['nom_produit']));
    $newsproduit->setDescription_Produit(htmlspecialchars($_POST['description_produit']));
    $newsproduit->setPrix_Produit(htmlspecialchars($_POST['prix_produit']));
    $newsproduit->setImg_Produit(htmlspecialchars($addresse));
    $newsproduit->créationProduit($bdd);
 
}else{

    
   echo $_SESSION['error'] = "Vous devez remplir tout les champs";
   header("Location: ../vues/listeProduitsAdmin.php");
    die();
}

?>