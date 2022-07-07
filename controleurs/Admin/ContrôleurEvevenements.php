<?php
// ajout de la classe Evenement
require_once 'modeles/Admin/GestionEvenement.php';


class ControleurEvenements extends Evenement

{
    // function voir les évènements //
    public function listeEvenAdm()
    {
        include('controleurs/connectionBdd.php');
        $lesevenements = Evenement::sowEven($bdd);
        require "vues/listeEvenementsAdmin.php";
    }

    // function voir un événement //
    public function voirEvenAdm($id_evenement)
    {
        include('controleurs/connectionBdd.php');
        $evenement = Evenement::getEvenementById($bdd, $id_evenement);
        require "vues/voirEvenementAdmin.php";
    }

    // function ajout d'un événement //
    public function ajoutEvenAdm()
    {
        include('controleurs/connectionBdd.php');
        require "vues/ajoutEvenementAdmin.php";
        // si toute les données sont remplies alors on ajoute l'événement
        if (
            !empty($_POST['valid_evenement']) &&
            isset($_POST["nom_evenement"]) && !empty($_POST["nom_evenement"])
            && isset($_POST["description_evenement"]) && !empty($_POST["description_evenement"])
            && isset($_POST["date_evenement"]) && !empty($_POST["date_evenement"])
            && isset($_POST["id_categorie"]) && !empty($_POST["id_categorie"])
        ) {
            // on instancie un objet Evenement
            $evenement = new Evenement();
            // on récupère les données du formulaire
            $evenement->setNom_Evenement(htmlspecialchars($_POST['nom_evenement']));
            $evenement->setDescription_Evenement(htmlspecialchars($_POST['description_evenement']));
            $evenement->setDate_Evenement(htmlspecialchars($_POST['date_evenement']));
            $evenement->setId_Categorie(htmlspecialchars($_POST['id_categorie']));
            // on ajoute l'événement dans la base de données
            $evenement->ajoutEvenement($bdd);
            // on redirige vers la page de liste des événements
            header('location: ' . URL . 'lesEvenements');
        }
    }

    // function modification d'un événement //
    public function modifierEvenAdm($idEvenement)
    {
        include('controleurs/connectionBdd.php');
        //on fait appel à la fonction getEvenementById pour récupérer l'événement à modifier
        $evenement = Evenement::getEvenementById($bdd, $idEvenement);
        //on affiche le formulaire de modification
        include('vues/modifierEvenAdm.php');
        // si toute les données sont remplies alors on modifie l'événement
        if (
            isset($_POST["nom_evenement"]) && !empty($_POST["nom_evenement"])
            && isset($_POST["description_evenement"]) && !empty($_POST["description_evenement"])
            && isset($_POST["date_evenement"]) && !empty($_POST["date_evenement"])
            && isset($_POST["id_categorie"]) && !empty($_POST["id_categorie"])
        ) {
            // on instancie un objet Evenement
            $evenement = new Evenement();
            // on récupère les données du formulaire
            $evenement->setId_Evenement($idEvenement);
            $evenement->setNom_Evenement(htmlspecialchars($_POST['nom_evenement']));
            $evenement->setDescription_Evenement(htmlspecialchars($_POST['description_evenement']));
            $evenement->setDate_Evenement(htmlspecialchars($_POST['date_evenement']));
            $evenement->setId_Categorie(htmlspecialchars($_POST['id_categorie']));           
            // on modifie l'événement dans la base de données
            $evenement->modifierEvenement($bdd);
            // on redirige vers la page de liste des événements
            header('location: ' . URL . 'lesEvenements');
        }
    }

    // function suppression d'un événement //
    public function supprimerEvenAdm($idEvenement)
    {
        include('controleurs/connectionBdd.php');
        // on supprime l'événement de la base de données
        Evenement::supprimerEvenement($bdd, $idEvenement);
        // on redirige vers la page de liste des événements
        header('location: ' . URL . 'lesEvenements');
    }
}
