<?php 
/**
 *  Template Name: NewsHub
 *  Template Post Type: post, page, nouvelle
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ?
    while ( have_posts() ) : the_post(); 
?>

    <article class="newshub-premiere">
        <?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
            <div class="premiere">
                <h2 class="premiere__titre">
                    <?php the_title(); // Titre de la nouvelle ?>
                </h2>
                <p class="premiere__texte">
                    <?php the_excerpt(); // Extrait de la description de la nouvelle ?>
                </p>
                <p class="premiere__date">
                    <?php the_date(); // Date de la nouvelle ?>
                </p>
                <a class="premiere__bouton" href="<?php the_permalink(); ?>">Accéder</a>
                <div class="premiere__overlay"></div>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" class="premiere__image" alt="<?php the_title(); ?>" />
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </article>

    <section class="newshub">
        <?php 
        $nouvelles = new WP_Query(array('post_type' => 'nouvelles')); // Requête pour les post type "nouvelles"
        if ( $nouvelles->have_posts() ) : 
            while ( $nouvelles->have_posts() ) : $nouvelles->the_post(); 
                // Récupération des champs personnalisés
                $news_card_title = get_post_meta(get_the_ID(), 'news_card_title', true);
                $news_card_image = get_post_meta(get_the_ID(), 'news_card_image', true);
                $news_card_date = get_post_meta(get_the_ID(), 'news_card_date', true);
                $news_card_tag = get_post_meta(get_the_ID(), 'news_card_tag', true);
        ?>
                <div class="news">
                    <button class="news__categorie news__categorie--article">
                        <?php echo esc_html($news_card_tag); // Tag de la nouvelle ?>
                    </button>
                    <h2 class="news__titre">
                        <?php echo esc_html($news_card_title); // Titre de la nouvelle ?>
                    </h2>
                    <div class="news__image">
                        <?php if (!empty($news_card_image)) : ?>
                            <img src="<?php echo esc_url($news_card_image); ?>" alt="<?php echo esc_attr($news_card_title); ?>" />
                        <?php else : ?>
                            <p>Aucune image disponible</p>
                        <?php endif; ?>
                    </div>
                    <p class="news__date">
                        <?php echo esc_html($news_card_date); // Date de la nouvelle ?>
                    </p>
                </div>
        <?php 
            endwhile; 
            wp_reset_postdata(); // Réinitialise la requête
        else : 
        ?>
            <p>Aucune nouvelle trouvée.</p>
        <?php endif; ?>
    </section>

<?php 
    endwhile; // Fin de la boucle principale
else : 
    get_template_part('partials/404'); // Affiche partials/404.php si aucun contenu n'est trouvé
endif;

get_sidebar(); // Affiche la barre latérale
get_footer(); // Affiche footer.php
?>
