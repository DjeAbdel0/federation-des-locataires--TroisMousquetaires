<?php 
/**
 *  Template Name: NewsHub
 *  Template Post Type: post, page, nouvelle
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ?
    while ( have_posts() ) : the_post(); 
?>

    <article>
        <?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>

        <?php endif; ?>
    </article>
    <section class="newshub-premiere" id="newshub-premiere">
        <!-- Le contenu de la premiere news -->
    </section>

    <section class="newshub" id="news-container">
        <!-- Le contenu des news suivantes-->
    </section>

    <section class="espaceBouton">
        <button class="voirPlus">Voir plus</button>
    </section>

<?php 
    endwhile; // Fin de la boucle principale
else : 
    get_template_part('partials/404'); // Affiche partials/404.php si aucun contenu n'est trouvé
endif;


get_footer(); // Affiche footer.php
?>
