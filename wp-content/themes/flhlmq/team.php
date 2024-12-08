<?php 
/**
 * 	Template Name: team
 * 	Template Post Type: page
 */

get_header(); // Affiche header.php
?>

<section class="hero">
    <div class="hero__content">
      <h1 class="hero__content__title"><?php the_field("hero_title"); ?></h1>
      <p class="hero__content__text"><?php the_field("hero_text"); ?></p>
    </div>
    <div class="hero__items">
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>/assets/medias/hero_01.jpeg" alt="Slide 1" class="hero__image">
      </div>
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>/assets/medias/hero_02.jpeg" alt="Slide 2" class="hero__image">
      </div>
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>/assets/medias/hero_03.jpeg" alt="Slide 3" class="hero__image">
      </div>
    </div>
  </section>

<!-- Section qui reste fixe, en dehors de la boucle -->
<div class="equipe">
    <h2 class="equipe__titre"><?php the_field("team_title"); ?></h2>
    <div class="equipe__carte">

    <?php
    if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
        $teams = new WP_Query('post_type=team');
 
        while ($teams->have_posts()) : $teams->the_post();
    ?>
        
            <!-- Carte -->
            <div class="equipe__membre" data-modal="modal<?php echo get_the_ID(); ?>">
                <?php the_post_thumbnail('full', ['class' => 'equipe__image']); ?>
                <h2 class="equipe__nom"><?php the_title(); ?></h2>
            </div>
        
        <?php endwhile; // Fermeture de la boucle ?>

    </div> <!-- Fermeture de la div "equipe__carte" -->

    <!-- Modals pour chaque membre d'équipe -->
    <?php
    // On boucle à nouveau pour afficher les modals, en dehors de la première boucle
    $teams = new WP_Query('post_type=team');
    while ($teams->have_posts()) : $teams->the_post();
    ?>
        <div id="modal<?php echo get_the_ID(); ?>" class="modal">
            <div class="modal__content">
                <span class="close">&times;</span>
                    <p class="equipe__text"><?php the_field("team_text"); ?></p>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
    
    <?php
    else : // Si aucune page n'a été trouvée
        get_template_part( 'partials/404' ); // Affiche partials/404.php
    endif;
    ?>

</div>

<?php get_footer(); // Affiche footer.php ?>
