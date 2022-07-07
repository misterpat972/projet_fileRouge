<?php
session_start();
include('../controleurs/connectionBdd.php');

if (!isset($_SESSION['mail_utilisateur'])) {
    header('Location: formulaire connection.php');
    exit();
}
?>

<!--barre de navigation-->
<?php
include('header.php');
include('../navBar/navAdminConnect.php');
?>

<!--corp de page-->
<section id="dates">
    <h2>Nos dates à venir...</h2>
    <p>-au café soleil à partir de 19h00: <u>le 30-05-2021</u>...</p>
    <!-- <div id="vidéos">
            <div class="clip">
                <iframe src="https://gifer.com/embed/h4m" width=680 height=400 frameBorder="0" allowFullScreen></iframe>
            </div> -->



</section>


<!-- footer -->

<?php
include("Footer.php");

?>

<!-- fin du footer -->