<?php 
/**
 * Template Name: ServiceHub
 * Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
    // Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
    while ( have_posts() ) : the_post(); 
?>

    <article class="service-hero"> 
        <?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
            <h2 class="service-hero__titre">
                <?php the_title(); // Titre de la page ?>
            </h2>
            <div class="service-hero__img">
                <img class="role__titre__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
            </div>
        <?php endif; ?>
    </article>  

    <div class="page-service">
            <?php the_content(); // Contenu principal de la page ?>

            <?php 
                $services = new WP_Query('post_type=services'); //récupère les services et les stocke dans $services
                ?>
                <?php  
                // Boucle pour chercher le titre, la description, l'image et le btn de chaque service
                while ( $services->have_posts() ) : $services->the_post();
            ?>
                <div class="page-service__assos">
    <img class="page-service__image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
    <p class="page-service__nom"><?php the_title(); ?></p>
    <p class="page-service__texte"><?php the_content(); ?></p>
    <a href="<?php the_permalink(); ?>"> <!-- Link to the service page -->
        <button class="page-service__btn">En savoir plus</button>
    </a>
</div>

            <?php 
                endwhile;
                wp_reset_postdata();  // Réinitialise les données de la requête
            ?>
        
    </div>

<?php endwhile; // Fermeture de la boucle
else : // Si aucune page n'a été trouvée
    get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar();  // Ajoute la barre latérale
get_footer();  // Affiche footer.php
?> 
