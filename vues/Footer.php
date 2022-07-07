    <section id="form">
        <div id="Apropos" data-aos="zoom-in" data-aos-duration="3000">
            <div id="contact">
                <!-- image du logo  -->
                <img src="<?= URL . "Img/logoSeul.png" ?>" width="50px" alt="logo">
                <h3>CONTACT</h3>
                <hr>
                <!-- email du groupe -->
                <h4>unconscious.harmony@gmail.com</h4>
                <div id="reseaux">
                    <a href="https://www.facebook.com/" title="facebook" target="_blank"><img class="lien" src="<?= URL . "Img/facebook (2).png" ?>" /></a>
                    <a href="https://www.youtube.com/" title="youtube" target="_blank"><img class="lien" src="<?= URL . "Img/youtube2.png" ?>" /></a>
                    <a href="https://www.instagram.com/" title="instagram" target="_blank"><img class="lien" src="<?= URL . "Img/instagram (2).png" ?>" /></a>
                </div>
            </div>
        </div>
        <div id="formulaire">
            <div data-aos="zoom-in" data-aos-duration="3000">
                <form action="maPage.php" method="post">
                    <input type="text" name="nom" id="nom" placeholder="Nom" required>
                    <input type="tel" name="tèl" id="tèl" placeholder="Téléphone" required>
                    <input type="email" name="mail" id="mail" placeholder="Adresse e-mail" required>
                    <textarea name="message" id="msg" cols="30" rows="10" placeholder="Laissez un message" required></textarea>
                    <input type="submit" value="NOUS CONTACTER">
                </form>
            </div>
        </div>
    </section>
    <!--pied de page-->
    <footer>
        <div id="copy">
            <h5>Uncounscious Harmony-Groupe Musical</h5>
        </div>
        <div>
            <p>Copyright@2021 Tous droits réservés</p>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </body>

    </html>