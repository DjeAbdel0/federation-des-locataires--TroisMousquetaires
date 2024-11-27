<?php 
/**
 * 	Template Name: NewsHub
 * 	Template Post Type: post, page, nouvelle
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	while ( have_posts() ) : the_post(); 
?>

	<article class="newshub-premiere">
		<?php if (!is_front_page()) : // Si nous ne sommes PAS sur la page d'accueil ?>
			<div class="premiere">
				<h2 class="premiere__titre">
					<?php the_title(); // Titre de la nouvelle?>
				</h2>
				<p class="premiere__texte">
					<?php the_excerpt(); // Extrait de la description de la nouvlle ?>
				</p>
				<p class="premiere__date">
					<?php the_date(); // Date de la nouvelle ?>
				</p>
				<a class="premiere__bouton" href="<?php the_permalink(); // bouton pour acceder à la nouvelle?>" >Accéder</a>
				<div class="premiere__overlay"></div>
				<img 
				<?php the_post_thumbnail('full', array('class' => 'premiere__image')) ?>
				>
			</div>
		<?php endif; ?>
	</article>
		<section class="newshub">
			
		<?php the_content(); // Contenu principal de la page ?>
		<?php $nouvelles = new WP_Query('post_type=nouvelles');?>
		<?php 
			while ( $nouvelles->have_posts() ) : $nouvelles->the_post(); // Boucle pour chercher le titre, la description et l'image de chaque service
		?>
			<div class="news">
				<button class="news__categorie news__categorie--article">
				<?php the_tag(); // Tag de la nouvelle?>
				</button>
				<h2 class="news__titre"><?php the_title(); // Titre de la nouvelle?></h2>
				<div class="news__image">
					<img
					<?php the_post_thumbnail('large'); // Image de la nouvelle ?>
					/>
				</div>
				<p class="news__date"><?php the_date(); // Date de la nouvelle ?></p>
			</div>
			<?php 
                endwhile;
                wp_reset_postdata();  // Réinitialise les données de la requête
            ?>	
		</section>

		<?php endwhile; // Fermeture de la boucle


else : // Si aucune page n'a été trouvée
    get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_sidebar();  // Ajoute la barre latérale
get_footer();  // Affiche footer.php
?>