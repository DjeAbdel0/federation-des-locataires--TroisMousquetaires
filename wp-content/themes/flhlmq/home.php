<?php
/**
* 	Template Name: Acceuil
* 	Identique à page, mais avec une barre latérale
*/

get_header();
// Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ?
// Si oui, bouclons au travers les pages ( logiquement, il n'y en aura qu'une )
while ( have_posts() ) : the_post();

?>

<article>
<?php if ( !is_front_page() ) : // Si nous ne sommes PAS sur la page d'accueil ?>
			<h2>
				<?php the_title(); // Titre de la page ?>
			</h2>
		<?php endif; ?>
		
		<?php the_content(); // Contenu principal de la page ?>

      <!-- Section Hero -->
  <section class="hero">
    <div class="hero__content">
      <h1 class="hero__content__title">"><?php the_field("hero_title"); ?></h1>
      <p class="hero__content__text"><?php the_field("hero_text"); ?></p>
    </div>
    <div class="hero__items">
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>./assets/hero_01.jpeg" alt="Slide 1" class="hero__image">
      </div>
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>./assets/hero_02.jpeg" alt="Slide 2" class="hero__image">
      </div>
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>./assets/hero_03.jpeg" alt="Slide 3" class="hero__image">
      </div>
    </div>
  </section>
  <!-- FIN Section Hero -->

    <!-- Section Dernières Actualités -->
    <section class="actualite">
      <h2 class="actualite__titre">Dernières actualités</h2>
      <div class="actualite__cartes"></div>
    </section>

	
	  <!--Section Services-->
	  <div class="fond">
    <section class="services">
      <div class="services__titre">

      <h2 class="services__titre"><?php echo get_field("acceuil_service_titre"); // Titre de la section ?></h2>

      </div>
      <div class="services__no1">
        <p><?php echo get_field("acceuil_service_sous-titre_1"); // Titre de la section ?></p>
		<a href="<?php echo esc_url( home_url( '/se' )  ); //Chemin d'accès vers liste des services ?>">
		<img src="<?php bloginfo('template_url'); ?>/assets/icons/Connect.png" alt="Connections">
		</a>
      </div>
      <div class="services__no2">
        <p><?php echo get_field("acceuil_service_sous-titre_2"); // Titre de la section ?></p>
		<a href="<?php echo esc_url( home_url( '/se' )  ); //Chemin d'accès vers liste des services ?>">
		<img src="<?php bloginfo('template_url'); ?>/assets/icons/Document.png" alt="Document">
		</a>
      </div>
      <div class="services__no3">
        <p><?php echo get_field("acceuil_service_sous-titre_3"); // Titre de la section ?></p>
        <a href="<?php echo esc_url( home_url( '/services/association/' ) ); //Chemin d'accès d'un service (CRR) ?>">
		<img src="<?php bloginfo('template_url'); ?>/assets/icons/Lease.png" alt="Mains qui donne une clé">
        </a>

      </div>
    </section>
  </div>
  <!--Fin Section Services-->

  
  <!--Section Don-->
  <section class="dons">
    <h2 class="dons__titre"><?php echo get_field("acceuildons_titre"); // Titre de la section ?></h2>
    <div class="dons__content">
      <div class="dons__content__text">
        <p><?php echo get_field("acceuildons_texte"); // texte de la section ?></p>
        <a  href="https://flhlmq.com/fr/publication/adhesion-et-abonnement">
          <button class="cta">Donner!</button>
        </a>
      </div>
      <div class="dons__content__image">
		<img src="<?php bloginfo('template_url'); ?>/assets/dons/maison_dons.jpg" alt="Mains qui donne une clé">
      </div>
    </div>
  </section>
  

  <!--FIN Section Don-->

<?php endwhile; // Fermeture de la boucle

else : // Si aucune page n'a été trouvée
get_template_part( 'partials/404' );
// Affiche partials/404.php
endif;

get_sidebar();
// Affiche le contenu de sidebar.php
get_footer();
// Affiche footer.php
?>
