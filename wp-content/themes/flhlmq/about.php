<?php 
/**
 * 	Template Name: about
 *  Template Post Type: post, page
 * 	Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>


	<div class="about">
      <img class="about__img" src="<?php the_post_thumbnail(); // Extrait de l'image?>">
      <h2 class="about__titre"><?php the_title(); // Titre de la page ?></h2>

      <!-----Info sur la page------>
      <p class="about__info">
        <?php the_content(); // Contenu principal de la page ?>
      </p>
      <!-----image a propos------>
      <img class="about__img" src="<?php the_field('about_image_1'); ?>">
      <h2 class="about__titre-mission"><?php the_field('about_title_1'); ?></h2>
      <!-----autre info------>
      <div class="about__info">
        <p class="about__p"> <?php the_field('about_description_1'); ?> </p>
        <br />
        <p class="about__p"> <?php the_field('about_description_2'); ?> </p>
        <br />
        <p class="about__p"> <?php the_field('about_description_3'); ?> </p>
        <br />
        <p class="about__p"> <?php the_field('about_description_4'); ?> </p>
      </div>
      <img class="about__img" src="<?php the_field('about_image_2'); ?>" />
      <div class="about__info">
        <p class="about__p"><?php the_field('about_description_5');?></p>
        <br />
        <p class="about__p">
			<?php the_field('about_description_6'); ?>
          <a
            href="https://flhlmq.com/sites/flhlmq.com/files/2022-09/R%C3%88GLEMENTS%20G%C3%89N%C3%89RAUX%20DE%20LA%20FLHLMQ-%202021.pdf"
            >ici</a
          >!
        </p>
        <br />
        <p class="about__p"> <?php the_field('about_description_7'); ?> </p>
      </div>
    </div>



<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>