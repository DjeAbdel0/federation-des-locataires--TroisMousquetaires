<?php
/**
* Template Name: ServiceHub
* Identique à page, mais avec une barre latérale
*/

get_header();
// Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ?
    // Si oui, bouclons au travers des pages ( logiquement, il n'y en aura qu'une )
    while ( have_posts() ) : the_post();
?>

<?php if ( !is_front_page() ) : // Si nous ne sommes PAS sur la page d'accueil ?>
    <div class="service-hero">
        <h2 class="service-hero__titre"><?php the_title(); // Titre de la page ?></h2>
        <img class="service-hero__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
    </div>
<?php endif; ?>

<div class="page-service">
    <?php the_content(); // Contenu principal de la page ?>

    <?php 
        // Récupère les services triés par date (du plus récent au plus ancien)
        $services = new WP_Query(array(
            'post_type' => 'services', // Le type de contenu personnalisé 'services'
            'orderby'   => 'date',     // Trier par date
            'order'     => 'ASC'      // Trier de manière décroissante (du plus récent au plus ancien)
        ));
    ?>
    
    
    <?php 
    // Boucle pour chercher le titre, la description, l'image et le bouton de chaque service
    while ( $services->have_posts() ) : $services->the_post();
    ?>
        <div class="page-service__assos">
    <img class="page-service__image" src="<?php the_post_thumbnail_url(); ?>"  />
    <p class="page-service__nom"><?php the_title(); ?></p>
    <div class="page-service__texte">
    <?php the_field('service_resume'); ?>
    
    </div>
    <a href="<?php the_permalink(); ?>"> <!-- Lien vers la page du service -->
        <button class="page-service__btn"><?php the_field('service_btn'); ?></button>
    </a>
</div>

    <?php
    endwhile;
    wp_reset_postdata(); // Réinitialise les données de la requête
    ?>
</div>

<?php endwhile; // Fermeture de la boucle
else : // Si aucune page n'a été trouvée
    get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar(); // Ajoute la barre latérale
get_footer(); // Affiche footer.php
?>
