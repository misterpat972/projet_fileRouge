<?php

//voir le contenu du panier
class ControleurPanier

{
    // fonction supprimer un article du panier
    public function supprimerArticle($id_produit)
    {
        if (isset($_POST['supprimerArticle'])) {
            foreach ($_SESSION['panier'] as $key => $value) {
                if ($value['id_produit'] == $id_produit) {
                }
            }
            unset($_SESSION['panier'][$key]);
            echo '<script>alert("Article supprimé du panier")
                window.location.href="' . URL . 'afficherPanier"</script>';
        }
    }

    // fonction afficher le panier et appel a la fonction supprimerArticle
    public function afficherPanier()
    {
        require_once 'vues/panier.php';
        // supprimer un article du panier
        $supp = new ControleurPanier();
        $supp->supprimerArticle($id_produit);
    }

    // fonction vider le panier
    public function viderPanier()
    {
        if (isset($_POST['viderPanier'])) {
            unset($_SESSION['panier']);
            echo '<script>alert("Panier vidé")</script>';
            header('Location: afficherPanier');
        }
    }
}


