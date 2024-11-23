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
                <?php 
                    the_post_thumbnail(); // Extrait de l'image
                ?>
            </div>
        <?php endif; ?>
    </article>  

    <div class="page-service">
        <div class="page-service__assos">
            <?php the_content(); // Contenu principal de la page ?>

            <?php 
                $services = new WP_Query('post_type=services');
                ?>
                <?php  
                // Boucle pour chercher le titre, la description et l'image de chaque service
                while ( $services->have_posts() ) : $services->the_post();
            ?>
                <div class="service-item">
                    <h3 class="page-service__nom">
                        <?php the_title(); // Titre du service ?>
                    </h3>
                    <div class="page-service__texte">
                        <?php the_excerpt(); // Extrait de la description du service ?>
                    </div>
                    <div class="page-service__image">
                        <?php the_post_thumbnail('medium'); // Extrait de l'image du service ?>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();  // Réinitialise les données de la requête
            ?>
        </div>
        
    </div>

<?php endwhile; // Fermeture de la boucle


else : // Si aucune page n'a été trouvée
    get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar();  // Ajoute la barre latérale
get_footer();  // Affiche footer.php
?>
