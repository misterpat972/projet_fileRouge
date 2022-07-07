<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.css" ?>>
    <title>Modifier l'évènement</title>
</head>
<body>
    <main class="container mt-5 ">
        <div class="row justify-content-center col-md-12">
            <!-- mise à jour d'un évènement -->
            <h1 class="text-center">Modifier l'évènement</h1>
            <div class="col-md-8 mt-5">
                <!-- ajout d'évenement -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nom_evenement">Nom de l'évènement</label>
                        <!-- input nom de l'évènement -->
                        <input type="text" id="nom_evenement" name="nom_evenement" placeholder="" value="<?= $evenement->nom_evenement ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description_evenement">Description de l'évenement</label>
                        <!-- input description de l'évènement -->
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description_evenement" placeholder="" value="<?= $evenement->description_evenement ?>"  ></textarea>

                    </div>
                    <div class="form-group">
                        <label for="date_evenement">Date de l'évènement</label>
                        <!-- input date de l'évènement -->
                        <input type="date" id="date_evenement" name="date_evenement" placeholder="" value="<?= $evenement->date_evenement ?>" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <!-- sélection de la catégorie -->
                        <select class="form-select" name="id_categorie" aria-label="Default select example" required>
                            <option selected>Sélection de la categorie</option>
                            <option value="1">albums</option>
                            <option value="2">pistes</option>
                            <option value="3">évènements</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <!-- bouton modifier -->
                        <button type="submit"  class="btn btn-primary">Modifier</button>
                        <!-- retour à la liste des évènements -->
                        <a href="<?= URL . "lesEvenements" ?>" class="btn btn-success">Retour à la liste d'utilisateur</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>