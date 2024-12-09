<?php 
/**
 *  Template Name: single-nouvelle
 */

get_header(); // Affiche header.php

if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- Carte de la nouvelle -->
<section class="newshub">
    <div class="news">
        <button class="news__categorie news__categorie--article">
            Article
        </button>
        <h2 class="news__titre"><?php the_title(); ?></h2>
        <div class="news__image">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
        </div>
        <p class="news__date"><?php echo get_the_date('Y-m-d'); ?></p>
    </div>
</section>

<!-- Contenu de l'article avec sections alternantes -->
<section class="newsarticle">
    <?php 
    // Récupérer le contenu
    $content = apply_filters('the_content', get_the_content());

    // Diviser le contenu en paragraphes
    $paragraphs = explode('</p>', $content);
    $count = 0; // Compteur pour alterner les couleurs

    foreach ($paragraphs as $para) :
        // Nettoyer le paragraphe en enlevant les balises HTML
        $para_trimmed = trim(strip_tags($para));

        // Sauter les blocs vides
        if ($para_trimmed === '') continue;

        // Ajouter la classe "sectionTexte__paragraphe" aux paragraphes
        $para_with_class = str_replace('<p>', '<p class="sectionTexte__paragraphe">', $para);

        // Déterminer la classe CSS basée sur le compteur
        $class = ($count % 2 === 0) ? 'sectionTexte--blanc' : 'sectionTexte--vert';
        ?>
        <div class="sectionTexte <?php echo $class; ?>">
            <?php echo $para_with_class; ?>
        </div>
        <?php
        $count++; // Incrémenter le compteur pour la prochaine itération
    endforeach; 
    ?>
</section>

<!-- Section Dernières Actualités -->
<section class="actualite">
<h2 class="actualite__titre">Dernières actualités</h2>
    <div class="actualite__cartes"></div>
    <!-- Bouton Voir plus -->
    <a href="<?php echo get_permalink(get_page_by_path('listes-des-nouvelles')->ID); ?>" class="actualite__btn">Voir Plus</a>
</section>

<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
    get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_footer(); // Affiche footer.php 
?>
