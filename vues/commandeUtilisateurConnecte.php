<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/commandeUtilisateurConnecte.css">
    <title>Commande</title>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <div class="container-xl px-4 mt-5">
        <!-- lien de navigation utilisateur connecté -->
        <nav class="nav nav-borders">
            <a class="nav-link" href="profileUtilisateurConnecte.php">Profile</a>
            <a class="nav-link active ms-0" href="#" target="__blank">Commandes</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Commentaires</a>
            <a class="nav-link" href="headerUtilisateurConnecté.php" target="__blank">Retour à l'accueil</a>
        </nav>
        <hr class="mt-0 mb-4">
        <!-- ajout mode de paiement-->
        <div class="card card-header-actions mb-4">
            <div class="card-header">
                méthodes de paiement
                <button class="btn btn-sm btn-primary" type="button">Ajouter un mode de paiement</button>
            </div>
            <div class="card-body px-0">
                <!-- méthode de paiement -->
                <div class="d-flex align-items-center justify-content-between px-4">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                        <div class="ms-4">
                            <div class="small">Visa se terminant par 1234</div>
                            <div class="text-xs text-muted">Expire le 04/2024</div>
                        </div>
                    </div>
                    <div class="ms-4 small">
                        <div class="badge bg-light text-dark me-3">par défault</div>
                        <a href="#!">Modifier</a>
                    </div>
                </div>
                <hr>
                <!-- méthode de paiement 2-->
                <div class="d-flex align-items-center justify-content-between px-4">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-cc-amex fa-2x cc-color-amex"></i>
                        <div class="ms-4">
                            <div class="small">American Express ending in 9012</div>
                            <div class="text-xs text-muted">Expires 01/2026</div>
                        </div>
                    </div>
                    <div class="ms-4 small">
                        <a class="text-muted me-3" href="#!">Mettre par défault</a>
                        <a href="#!">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Historique de commande-->
        <div class="card mb-4">
            <div class="card-header">Historique de commande</div>
            <div class="card-body p-0">
                <!--tableau historique -->
                <div class="table-responsive table-billing-history">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-gray-200" scope="col">Identifiant de transaction</th>
                                <th class="border-gray-200" scope="col">Date</th>
                                <th class="border-gray-200" scope="col">Quantité</th>
                                <th class="border-gray-200" scope="col">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#39201</td>
                                <td>06/15/2021</td>
                                <td>29.99€</td>
                                <td><span class="badge bg-light text-dark">En attente</span></td>
                            </tr>
                            <tr>
                                <td>#38594</td>
                                <td>05/15/2021</td>
                                <td>29.99€</td>
                                <td><span class="badge bg-success">Payé</span></td>
                            </tr>
                            <tr>
                                <td>#38223</td>
                                <td>04/15/2021</td>
                                <td>29.99€</td>
                                <td><span class="badge bg-success">Payé</span></td>
                            </tr>
                            <tr>
                                <td>#38125</td>
                                <td>03/15/2021</td>
                                <td>29.99€</td>
                                <td><span class="badge bg-success">payé</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>