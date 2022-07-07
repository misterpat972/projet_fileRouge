<?php

class Evenement
{
    // attributs de la classe Evenement
    private $id_evenement;
    private $nom_evenement;
    private $description_evenement;
    private $date_evenement;
    private $id_categorie;


    /**
     * Get the value of id_evenement
     */
    public function getId_evenement()
    {
        return $this->id_evenement;
    }

    /**
     * Set the value of id_evenement
     *
     * @return  self
     */
    public function setId_evenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;

        return $this;
    }

    /**
     * Get the value of nom_evenement
     */
    public function getNom_evenement()
    {
        return $this->nom_evenement;
    }

    /**
     * Set the value of nom_evenement
     *
     * @return  self
     */
    public function setNom_evenement($nom_evenement)
    {
        $this->nom_evenement = $nom_evenement;

        return $this;
    }

    /**
     * Get the value of description_evenement
     */
    public function getDescription_evenement()
    {
        return $this->description_evenement;
    }

    /**
     * Set the value of description_evenement
     *
     * @return  self
     */
    public function setDescription_evenement($description_evenement)
    {
        $this->description_evenement = $description_evenement;

        return $this;
    }

    /**
     * Get the value of date_evenement
     */
    public function getDate_evenement()
    {
        return $this->date_evenement;
    }

    /**
     * Set the value of date_evenement
     *
     * @return  self
     */
    public function setDate_evenement($date_evenement)
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }


    /**
     * Get the value of id_categorie
     */
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }


    //---------------------------------------------- mes fontions --------------------------------------------------
    // afficher un evenement
    public function getEvenementById($bdd, $id_evenement)
    {
        $req = $bdd->prepare('SELECT * FROM evenement WHERE id_evenement = :id_evenement');
        $req->execute(array(
            'id_evenement' => $id_evenement
        ));
        $resultat = $req->fetch(PDO::FETCH_OBJ);
        return $resultat;
    }

    // afficher tous les evenements   
    public function sowEven($bdd)
    {
        $req = $bdd->prepare('SELECT * FROM evenement INNER JOIN commentaire ON evenement.id_evenement = commentaire.id_evenement');
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_OBJ);       
         return $resultat;
    }

    // ajouter un evenement 
    public function ajoutEvenement($bdd)
    {
        // on récupère les set de la classe controleur
        $nom_evenement = $this->getNom_evenement();
        $description_evenement = $this->getDescription_evenement();
        //on passe le format de la date au format européen
        $date_evenement = date('Y-m-d', strtotime($this->getDate_evenement()));

        //$date_evenement = $this->getDate_evenement();
        $id_categorie = $this->getId_categorie();

        // on prépare la requete avec ajout catégorie 
        $req = $bdd->prepare('INSERT INTO evenement(nom_evenement, description_evenement, date_evenement, id_categorie) VALUES(:nom_evenement, :description_evenement, :date_evenement, :id_categorie)');
        // on execute la requete
        $req->execute(array(
            'nom_evenement' => $nom_evenement,
            'description_evenement' => $description_evenement,
            'date_evenement' => $date_evenement,
            'id_categorie' => $id_categorie
        ));
        // si la requete est bien executée on retourne true on affiche un message de succès
        if ($req) {
            $_SESSION['message'] = 'L\'événement a bien été ajouté';
        } else {
            $_SESSION['error'] = 'L\'événement n\'a pas été ajouté';
        }
    }

    // modifier un evenement 
    public function modifierEvenement($bdd)
    {
        // on récupère les set de la classe controleur
        $nom_evenement = $this->getNom_evenement();
        $description_evenement = $this->getDescription_evenement();
        $date_evenement = $this->getDate_evenement();
        $id_evenement = $this->getId_evenement();
        $id_categorie = $this->getId_categorie();

        // on prépare la requete avec ajout catégorie        
        $req = $bdd->prepare('UPDATE evenement SET nom_evenement = :nom_evenement, description_evenement = :description_evenement, date_evenement = :date_evenement, id_categorie = :id_categorie  WHERE id_evenement = :id_evenement');
        // on execute la requete
        $req->execute(array(
            'nom_evenement' => $nom_evenement,
            'description_evenement' => $description_evenement,
            'date_evenement' => $date_evenement,
            'id_evenement' => $id_evenement,
            'id_categorie' => $id_categorie
        ));
    }

    // supprimer un evenement
    public function supprimerEvenement($bdd, $id_evenement)
    {
        $req = $bdd->prepare('DELETE FROM evenement WHERE id_evenement = :id_evenement');
        $req->execute(array(
            'id_evenement' => $id_evenement
        ));
    }
}
