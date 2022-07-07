<?php
// on inclut le header
include('header.php');
?>
<title>Acceuil</title>
<?php
// on inclut la navbar
include('BarNav.php');
?>

<!--corp de page-->
<section id="dates">
   <h2>A propos de nous</h2>
   <hr id="premierHr">
   <div id="Apropos" data-aos="fade-up" data-aos-duration="3000">
      <div id="image">
         <img src="Img/Nous.jpg" alt="groupe musique">
      </div>
      <p id="collectif">Collectif de 7 musiciens né d’une amitié en 2009,
         Unconscious Harmony est un groupe de fusion des styles et
         des influences. Ces compositions, teintées de reggae, soul,
         ska, rock et d’electro, emmènent le public dans des situations
         et émotions racontées ou vécues avec la volonté de délivrer
         un message d'espoir, de force intérieure et d'amour.
         Les musiciens d'UH nourrissent leur inspiration dans la
         spontanéité des émotions les plus intimes, désireux de révéler
         tous les aspects les plus sombres mais aussi les plus positifs
         de nos relations avec les autres.
      </p>
   </div>
</section>

<!-- footer -->
<?php include('Footer.php'); ?>