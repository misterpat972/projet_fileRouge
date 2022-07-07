<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md3">
   <div class="container">
      <a href="#" class="navbar-brand">Unconscious Harmony</a>
      <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
         <span class="navbar-toggler-icon" id="toggle"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
         <div class="mx-auto"></div>
         <ul class="navbar-nav ">
            <il class="nav-item ">
               <a href="../vues/headerUtilisateurConnecté.php" class="nav-link">Accueil</a>
            </il>
            <il class="nav-item">
               <a href="#" class="nav-link">Music</a>
            </il>
            <il class="nav-item">
               <a href="#" class="nav-link">Média</a>
            </il>
            <il class="nav-item">
               <a href="../vues/formulaireContact.php" class="nav-link">Contact</a>
            </il>

            <il class="nav-item">
               <a href="../vues/profileUtilisateurConnecte.php" class="btn btn-default" id="connection" role="button">Mon Compte</a>
            </il>

            <il class="nav-item" id="disconect">
               <a href="../controleurs/deconnexion.php" class="btn btn-default" id="connection" role="button"><i class="fas fa-sign-out-alt"></i></a>
               <!--<a href=""> <i class="fas fa-sign-out-alt"></i></a>-->
            </il>

         </ul>
      </div>

   </div>
</nav>

<!--script pour la navbar toggler -->
<script src="../JS/scrollNavBar.js"></script>
<script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>