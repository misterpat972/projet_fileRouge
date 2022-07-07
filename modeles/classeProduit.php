<?php
class Produit
{

    // attributs de mon modèle //
    private $id_produit;
    private $nom_produit;
    private $description_produit;
    private $prix_produit;
    private $img_produit;
    private $id_categorie;


    //getter && setter id_produit //
    public function getId_produit()
    {
        return $this->id_produit;
    }

    public function setId_produit($id_produit)
    {
        $this->id_produit = $id_produit;
    }
    // getter && setter nom_produit //
    public function getNom_produit()
    {
        return $this->nom_produit;
    }

    public function setNom_produit($nom_produit)
    {
        $this->nom_produit = $nom_produit;
    }
    // getter && setter description_produit //
    public function getDescription_produit()
    {
        return $this->description_produit;
    }

    public function setDescription_produit($description_produit)
    {
        $this->description_produit = $description_produit;
    }
    // getter && setter prix_produit //
    public function getPrix_produit()
    {
        return $this->prix_produit;
    }

    public function setPrix_produit($prix_produit)
    {
        $this->prix_produit = $prix_produit;
    }
    // getter && setter img_produit //
    public function getImg_produit()
    {
        return $this->img_produit;
    }

    public function setImg_produit($img_produit)
    {
        $this->img_produit = $img_produit;
    }
    // getter && setter id_categorie //
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }


    // création d'article //
    public function créationProduit($bdd)
    {
        // on récupère les données du formulaire grace au getter //
        $nom = $this->getNom_produit();
        $description = $this->getDescription_produit();
        $prix = $this->getPrix_produit();
        $img = $this->getImg_produit();
        $id_categorie = $this->getId_categorie();
        // on crée une requête SQL INSERT INTO //
        $req = $bdd->prepare('INSERT INTO produit (nom_produit, description_produit, prix_produit, img_produit, id_categorie) VALUES (:nom_produit, :description_produit, :prix_produit, :img_produit, :id_categorie)');
        $req->execute(array(
            'nom_produit' => $nom,
            'description_produit' => $description,
            'prix_produit' => $prix,
            'img_produit' => $img,
            'id_categorie' => $id_categorie

        ));
        if ($req) {
            // si la requête est ok, on affiche un message de succès //
            $_SESSION['message'] = "Article crée avec succes";
        } else {
            // si la requête n'est pas ok, on affiche un message d'erreur //
            $_SESSION['message'] = "Problème lors de la création d'article";
        }
    }

    // voir un produit //
    public function voirUnProduitAdm($bdd)
    {   // on récupère l'id du produit grace au getter //
        $id_produit = $this->getId_produit();
        // on crée une requête SQL SELECT //
        $sql = "SELECT * FROM produit WHERE id_produit = :id_produit";
        $data = $bdd->prepare($sql);
        $data->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
        $data->execute();
        $produit = $data->fetchAll();
        // si le produit existe alors on foreach //
        if ($produit > 0) {
            foreach ($produit as $row) {
                // on lit les données du produit que l'on passe en session //
                $_SESSION['id_produit'] = $row['id_produit'];
                $_SESSION['nom_produit']  = $row['nom_produit'];
                $_SESSION['description_produit']  = $row['description_produit'];
                $_SESSION['prix_produit'] = $row['prix_produit'];
                $_SESSION['img_produit'] = $row['img_produit'];
            }
            if (!$produit) {

                $_SESSION['message'] = "produit non trouvée";
                header('location: lesProduits');
            }
        }
    }

    // mise à jour produit //
    public function miseAjourProduit($bdd)
    {

        $id_produit = $this->getId_produit();
        $nom_produit = $this->getNom_produit();
        $description_produit = $this->getDescription_produit();
        $prix_produit = $this->getPrix_produit();
        $img_produit = $this->getImg_produit();
        $id_categorie = $this->getId_categorie();       

        $data = $bdd->prepare('UPDATE produit SET nom_produit = :nom_produit, description_produit = :description_produit, prix_produit = :prix_produit, img_produit = :img_produit, id_categorie = :id_categorie  WHERE id_produit = :id_produit');
        $result = $data->execute(array(
            'id_produit' => $id_produit,
            'nom_produit' => $nom_produit,
            'description_produit' => $description_produit,
            'prix_produit' => $prix_produit,
            'img_produit' => $img_produit,
            'id_categorie' => $id_categorie,

        ));

        if ($result) {
            $_SESSION['message'] = "produit mise à jour";
            header('location: lesProduits');
        } elseif ($data != true) {
            $_SESSION['message'] = "produit identique";
            header('location: lesProduits');
        } else {
            $_SESSION['message'] = "problème de mise à jour";
            header('location: lesProduits');
        }

        
    }

    // fonction suppression de produit //

    public function suppressionProduit($bdd)
    {

        $id_categorie = $this->getId_produit();

        $sql = $bdd->prepare("DELETE  FROM produit WHERE id_produit = :id_produit");
        $result = $sql->execute(['id_produit' => $id_categorie]);

        if ($result) {
            $_SESSION['message'] = "produit bien supprimé";
        } else {
            $_SESSION['error'] = "problème de suppression";
        }
    }

    //affichage liste de produits //

    /**
     * @return Produit[]
     */
    public static function sowProduct($bdd): array
    {

        $sql = $bdd->prepare("SELECT * FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
