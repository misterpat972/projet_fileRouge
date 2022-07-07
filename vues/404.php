<?php
// header et barnav //
include_once('vues/header.php');
?>
<title>404</title>
<?php
include_once('vues/barNav.php');
?>
<!-- message d'erreur 404-->
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops...! </h1>
                <h2>
                    Erreur 404</h2>
                <div class="error-details">
                    La page que vous recherchez n'existe pas...!
                </div>
                <div class="error-actions mt-4">
                    <a href=<?= URL ?> class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Retour à l'accueil </a>
                </div>
            </div>
        </div>
    </div>
</div>