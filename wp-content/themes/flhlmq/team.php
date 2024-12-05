<?php 
/**
 * 	Template Name: team
 * 	Template Post Type: page

 */

get_header(); // Affiche header.php
?>
<div class="equipe">
      <h2 class="equipe__titre">Équipe de la FLHLMQ</h2>
	  <?php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	$teams = new WP_Query('post_type=team');
 
    while ($teams->have_posts()) : $teams->the_post();
?>

      <!-- Les membres d'equipe -->
      <div class="equipe__carte">
        <!-- Carte 1 -->
        <div class="equipe__membre" data-modal="modal1">
			<?php the_post_thumbnail('full', ['class' => 'equipe__image']); ?>
          <h2 class="equipe__nom"><?php the_title(); ?></h2>
        </div>
      </div>
    </div>


    <div id="modal1" class="modal">
      <div class="modal__content">
        <span class="close">&times;</span>
        <div class="equipe__info">
          <p class="equipe__text">
		  <?php the_content(); ?></p>
        </div>
      </div>
    </div>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_footer(); // Affiche footer.php 
?>