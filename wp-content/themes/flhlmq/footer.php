<?php
	/*-----------------------------------------------------------------------------------*/
	/* Affiche le pied de page (Footer) sur toutes vos pages
	/*-----------------------------------------------------------------------------------*/

// Fermeture de la zone de contenu principale ?>
</main>

<footer>
<div class="footer__grid">
      <a class="footer__logo-container" href="<?php echo esc_url( home_url( '/' ) ); //Lien du logo vers la page d'acceuil ?>"><img
        class="footer__logo"
        src="<?php echo get_template_directory_uri(); //Chemin d'accès de l'image ?>/assets/logo/logo_nouveau.png"/></a>
      <div class="footer__lien">
        <a href="<?php echo esc_url( home_url( '/news-hub' ) );//Chemin d'accès de news-hub ?>">Nouvelles</a>
        <a href="<?php echo esc_url( home_url( '/services/association/' ) ); //Chemin d'accès d'un service (CRR) ?>">Services</a>
        <a href="<?php echo esc_url( home_url( '/team' ) ); //Chemin d'accès de team ?>">Équipe</a>
        <a href="<?php echo esc_url( home_url( '/contactez-nous' ) ); //Chemin d'accès de contatc-us ?>">Nous Joindre</a>
        <a href="<?php echo esc_url( home_url( '/about' ) ); //Chemin d'accès de about ?>">À propos</a>
        <a href="https://flhlmq.com/fr/publication/adhesion-et-abonnement"><button class="cta">Donner</button></a>
      </div>
      <a
        class="footer__link"
        href="https://www.google.ca/maps/place/F%C3%A9d%C3%A9ration+des+Locataires+d'Habitations+A+loyer+modique+du+Qu%C3%A9bec/@45.4840974,-73.5796534,16z/data=!3m1!4b1!4m6!3m5!1s0x4cc91a70a26b6f7b:0x4dc61d8e3c023eb2!8m2!3d45.4840974!4d-73.5770785!16s%2Fg%2F1vwlnrln?hl=fr&entry=ttu&g_ep=EgoyMDI0MTAxNi4wIKXMDSoASAFQAw%3D%3D"
        ><p class="footer__adresse">
          2520 Av. Lionel-Groulx, Montréal, QC H3J 1J8
        </p></a
      >
      <div class="footer__reseaux">
        <a href="https://www.facebook.com/flhlmq/"
          ><i class="bi bi-facebook"></i
        ></a>
        <i class="bi bi-twitter"></i>
        <a href="https://www.youtube.com/@robertpilon547"
          ><i class="bi bi-youtube"></i
        ></a>
        <i class="bi bi-instagram"></i>
        <i class="bi bi-person"></i>
      </div>
    </div>
      <p class="footer__equipe">@2024 FLHLMQ, TroisMousquetaires </p>    

    <!--Partenaire-->
<div class="pdp">
    <div class="pdp-container">
        <h2 class="pdp-titre">Nos Partenaires</h2>
        <div class="pdp-grid">
            <?php 
            // Récupérer les partenaires avec WP_Query
            $partners = new WP_Query('post_type=partenaire');
            while ($partners->have_posts()) : $partners->the_post(); 
                // Récupérer l'URL de l'image
                $image = get_the_post_thumbnail_url(); // URL de l'image à la une
                $partenaire_url = get_field('partenaire_url'); // URL personnalisée
                ?>
                <div>
                    <a href="<?php echo esc_url($partenaire_url); ?>" target="_blank">
                        <img class="img__partenaire" src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                    </a>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="pdp-logo">
            <a href="https://www.canada.ca/fr/patrimoine-canadien.html" target="_blank">
                <img src="https://www.lescegeps.com/a/public/partenaires/patrimoine-canadien.png" alt="Patrimoine Canada" title="Patrimoine Canada">
            </a>
            <button class="cta">Donner</button>
        </div>
    </div>
</div>

</footer>

<?php wp_footer(); 
/* Espace où WordPress peut insérer des fichiers .js et autres. Par exemple pour des extensions (plugins). 
	 Si vous enlevez cette fonction, vous désactiverez du même coup toutes vos extensions (plugins) 🤷. 
	 Vous pouvez la déplacer si désiré, mais garder là. */
?>

</body>
</html>
