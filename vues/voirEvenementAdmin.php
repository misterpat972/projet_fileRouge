<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= URL . "bootstrap-5.1.3-dist/css/bootstrap.css" ?>>
    <title>Évènement</title>
</head>
<body>
    <!-- voir un évènement -->
    <main class="container">
        <div class="row">
            <div class="col-md-12 mt-5 ">
                <!-- nom de l'évènement -->
                <p class="text-center">
                <h3><strong>Évènement :</strong> <?= $evenement->nom_evenement ?></h3>
                </p>
                <!-- description de l'évènement -->
                <textarea class="form-control" id="nom_evenement" name="nom_evenement" rows="5" cols="100"><?= $evenement->description_evenement ?></textarea>
                <!-- date de l'évènement -->
                <p class="text-center">
                <h3><strong>Date de l'évènement : </strong><?= date("d-m-Y", strtotime($evenement->date_evenement)) ?></h3>
                </p>
                <!-- retour à la liste des évènements -->
                <a href="<?= URL . "lesEvenements" ?>" class="btn btn-success mt-5">Retour à la liste des évènements</a>
            </div>
    </main>
</body>

</html>