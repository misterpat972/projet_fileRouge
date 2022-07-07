<!-- ici on a les produits ajouter au panier -->
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Produit au panier</h5>
                    </div>
                    <div class="card-body">
                        <!-- Single item -->
                        <div class="row">
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp" class="w-100" alt="Blue Jeans Jacket" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>
                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <p><strong><?= $value['nom_produit']; ?></strong></p>
                                <p><?= $value['description_produit']; ?></p>
                                <p>Prix:<?= $value['prix_produit']; ?></p>
                                <!-- <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button> -->
                                <!-- suppression d'un article -->
                                <form action="<?= URL . "supprimerArticle" . "/" . $key ?>" method="POST">
                                    <input type="hidden" name="id_produit" value="<?= $key ?>">
                                    <input type="submit" name="supprimerArticle" value="Supprimer" class="btn btn-primary btn-sm me-1 mb-2">
                                </form>
                                <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" title="Move to the wish list">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <!-- Data -->
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <!-- Quantity -->
                                <div class="d-flex mb-4" style="max-width: 300px">
                                    <button class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <div class="form-outline">
                                        <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                                        <label class="form-label" for="form1">Quantity</label>
                                    </div>

                                    <button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- Quantity -->

                                <!-- Price -->
                                <p class="text-start text-md-center">
                                    <strong>$17.99</strong>
                                </p>
                                <!-- Price -->
                            </div>
                        </div>
                        <!-- Single item -->

                        <hr class="my-4" />



                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body">
                                <p><strong>Mode de paiement accepté</strong></p>
                                <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa" />
                                <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard" />
                                <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp" alt="PayPal acceptance mark" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Total</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Sous totals
                                        <span>$53.98</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total</strong>
                                        </div>
                                        <span><strong>$53.98</strong></span>
                                    </li>
                                </ul>

                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                    Payer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>


<!-- connection utilisateur -->
<?php
// connection d'un utilisateur //
    // public function connectionUtilisateur($bdd)
    // {   // on récupère grâce au guetteur les données de l'utilisateur //
    //     $mail_utilisateur = $this->getMailUtilisateur();
    //     $mdp_utilisateur = $this->getMdpUtilisateur();
    //     try {
    //         // on passe par une requête préparée pour éviter les injections SQL //
    //         $sql = $bdd->prepare("SELECT * FROM utilisateur WHERE mail_utilisateur = :mail_utilisateur");
    //         $sql->execute([
    //             'mail_utilisateur' => $mail_utilisateur
    //         ]);
    //         // on récupère les données de la requête //
    //         $data = $sql->fetchAll();
    //         // on vérifie dans data si les valeurs mail correspondent //
    //         if ($data != null) {
    //             // on fait un foreach pour récupérer les données de l'utilisateur //
    //             foreach ($data as $row) {
    //                 $id_droit = $row['id_droit'];
    //                 $id = $row['id_utilisateur'];
    //                 $nom_utilisateur = $row['nom_utilisateur'];
    //                 $prenom_utilisateur = $row['prenom_utilisateur'];
    //                 $mail_utilisateur = $row['mail_utilisateur'];
    //                 $addresse_utilisateur = $row['addresse_utilisateur'];
    //                 $password = $row['mdp_utilisateur'];
    //             }
    //             // on vérifie si le mot de passe correspond à celui enregistré en base de données //
    //             if (password_verify($mdp_utilisateur, $password)) {
    //                 // on crée une session pour l'utilisateur //
    //                 $_SESSION['id_droit'] = $id_droit;
    //                 $_SESSION['id_utilisateur'] = $id;
    //                 $_SESSION['nom_utilisateur'] = $nom_utilisateur;
    //                 $_SESSION['prenom_utilisateur'] = $prenom_utilisateur;
    //                 $_SESSION['mail_utilisateur'] = $mail_utilisateur;
    //                 $_SESSION['addresse_utilisateur']   = $addresse_utilisateur;
    //                 $_SESSION['mdp_utilisateur'] = $password;
    //                 // on redirige vers la page d'accueil //
    //                 if ($id_droit == 2 || $id_droit == 1) {
    //                     header('location:' . URL);
    //                     die();
    //                 }
    //             } else {
    //                 $_SESSION['error'] = "identifiant incorrect";
    //                 header('location: connexion');
    //             }
    //         } else {
    //             throw new Exception("<script language=javascript> alert('compte non existant !');
    //             document.location='connexion';
    //             </script>");
    //         }
    //     } catch (Exception $e) {
    //         die('erreur :' . $e->getMessage());
    //     }
    // }
?>