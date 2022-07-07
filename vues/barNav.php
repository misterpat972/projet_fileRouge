<!-- Navbar -->
<header id="bannière">
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md3">
      <div class="container">
         <a href="#" id="nomGroup" class="navbar-brand">Unconscious Harmony</a>
         <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
            <span class="navbar-toggler-icon" id="toggle"></span>
         </button>
         <div class="collapse navbar-collapse " id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav ">
               <il class="nav-item ">
                  <!-- vers l'accueil -->
                  <a href=<?= URL ?> class="nav-link">Accueil</a>
               </il>
               <il class="nav-item">
                  <!-- vers la musique -->
                  <a href="<?= URL . "musique" ?>" class="nav-link">Music</a>
               </il>
               <il class="nav-item">
                  <!-- vers les videos et photos -->
                  <a href="#" class="nav-link">Média</a>
               </il>
               <il class="nav-item">
                  <!-- vers contact -->
                  <a href=<?= URL . "contact" ?> class="nav-link">Contact</a>
               </il>
               <?php
               // si aucun utilisateur n'est connecté alors afficher le lien connexion //
               if (empty($_SESSION['mail_utilisateur'])) {
               ?>
                  <il class="nav-item" id="buttonConnect">
                     <!-- vers la connexion -->
                     <a href=<?= URL . "connexion" ?> class="btn btn-default" class="btn btn-default" id="connection" role="button">connexion </a>
                  </il>
                  <?php } else {
                  // si un utilisateur est connecté alors afficher le lien déconnexion et son lien profile //
                  if (!empty($_SESSION['mail_utilisateur']) && $_SESSION['id_droit'] == 1) {
                  ?>
                     <il class="nav-item" id="disconect">
                        <!-- vers le compte utilisateur -->
                        <a href=<?= URL . "profileUtilisateur" ?> class="btn btn-default" class="btn btn-default" id="connection" role="button">Mon compte</a>
                     </il>
                     <il class="nav-item" id="disconect">
                        <!-- vers la déconnexion -->
                        <a href="<?= URL . "deconnexion" ?>" class="btn btn-default" id="connection" role="button"><i class="fas fa-sign-out-alt"></i></a>
                     </il>
                     <!-- voir panier -->
                     <?php if (!empty($_SESSION['panier'])) : ?>
                        <il class="nav-item" id="">
                           <!-- vers le panier -->
                           <a href=<?= URL . "afficherPanier" ?> class="btn btn-default" id="connection" role="button"><i class="fas fa-shopping-cart"></i></a>
                        </il>
                     <?php endif; ?>
               <?php }
               } ?>
               <?php
               // si un administrateur est connecté alors afficher le lien déconnexion et son lien profile //
               if (!empty($_SESSION['mail_utilisateur']) && $_SESSION['id_droit'] == 2) {
               ?>
                  <il class="nav-item" id="disconect">
                     <!-- vers le compte administrateur -->
                     <a href=<?= URL . "gererSite" ?> class="btn btn-default" class="btn btn-default" id="connection" role="button">Gérer le site</a>
                  </il>
                  <il class="nav-item" id="disconect">
                     <!-- vers la déconnexion de l'admin -->
                     <a href="<?= URL . "deconnexion" ?>" class="btn btn-default" id="connection" role="button"><i class="fas fa-sign-out-alt"></i></a>
                  </il>
               <?php } ?>
            </ul>
         </div>
      </div>
   </nav>
</header>

<!--script pour la navbar toggler -->
<script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="JS/scrollNavBar.js"></script>