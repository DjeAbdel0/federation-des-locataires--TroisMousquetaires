<?php 
/**
 * 	Template Name: À propos
 * 	Identique à page, mais avec une barre latérale
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>

	<article>
		<?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
			<h2>
				<?php the_title(); // Titre de la page ?>
			</h2>
		<?php endif; ?>
		
		<?php the_content(); // Contenu principal de la page ?>

		<section class="newsarticle">
  <!-- Première section (paragraphe 1) -->
  <div class="sectionTexte sectionTexte--blanc">
    <?php if (get_field('paragraphe_1')): ?>
      <p class="sectionTexte__paragraphe">
        <?php echo esc_html(get_field('paragraphe_1')); ?>
      </p>
    <?php endif; ?>

    <?php if (get_field('paragraphe_2')): ?>
      <p class="sectionTexte__paragraphe">
        <?php echo esc_html(get_field('paragraphe_2')); ?>
      </p>
    <?php endif; ?>
  </div>

  <!-- Deuxième section (paragraphe 3) -->
  <div class="sectionTexte sectionTexte--vert">
    <?php if (get_field('paragraphe_3')): ?>
      <p class="sectionTexte__paragraphe">
        <strong>
          <?php echo esc_html(get_field('paragraphe_3')); ?>
        </strong>
      </p>
    <?php endif; ?>
  </div>

  <!-- Troisième section (paragraphe 4) -->
  <div class="sectionTexte sectionTexte--blanc">
    <?php if (get_field('paragraphe_4')): ?>
      <p class="sectionTexte__paragraphe">
        <?php echo esc_html(get_field('paragraphe_4')); ?>
      </p>
    <?php endif; ?>
  </div>

  <!-- Quatrième section (paragraphe 5) -->
  <div class="sectionTexte sectionTexte--vert">
    <?php if (get_field('paragraphe_5')): ?>
      <p class="sectionTexte__paragraphe">
        <?php echo esc_html(get_field('paragraphe_5')); ?>
      </p>
    <?php endif; ?>
  </div>
</section>
	</article>
<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar(); // Affiche le contenu de sidebar.php
get_footer(); // Affiche footer.php 
?>