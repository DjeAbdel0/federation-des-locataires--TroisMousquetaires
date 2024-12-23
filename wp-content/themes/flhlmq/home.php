<?php
/**
* 	Template Name: Acceuil
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
		
		

      <!-- Section Hero -->
  <section class="hero">
    <div class="hero__content">
      <h1 class="hero__content__title"><?php the_field("hero_finale"); ?></h1>
      <p class="hero__content__text"><?php the_field("hero_text"); ?></p>
    </div>
    <div class="hero__items">
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>/assets/hero_01.jpeg" alt="Slide 1" class="hero__image">
      </div>
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>/assets/hero_02.jpeg" alt="Slide 2" class="hero__image">
      </div>
      <div class="hero__item">
        <img src="<?php bloginfo('template_url'); ?>/assets/hero_03.jpeg" alt="Slide 3" class="hero__image">
      </div>
    </div>
  </section>
  <!-- FIN Section Hero -->

    <!-- Section Dernières Actualités -->
    <section class="actualite">
      <h2 class="actualite__titre">Dernières actualités</h2>
      <div class="actualite__cartes"></div>
    <!-- Bouton Voir plus -->
    <a href="<?php echo get_permalink(get_page_by_path('listes-des-nouvelles')->ID); ?>" class="actualite__btn">Voir Plus</a>
    </section>

    <!--Section Témoignages-->
    <section class="temoins">
      <h2 class="temoins__titre"><?php echo the_field("main_titre"); ?></h2>
      <div class="temoins__carte">
        <img src="<?php echo the_field("img_1"); ?>" class="temoins__img temoins__1">
        <p class="temoins__nom temoins__nom-1"><?php echo the_field("nom_1"); ?></p>
        <p class="temoins__text temoins__text-1"><?php the_field("temoins_1"); ?></p>
        <img src="<?php echo the_field("img_2"); ?>" class="temoins__img temoins__2">
        <p class="temoins__nom temoins__nom-2"><?php the_field("nom_2"); ?></p>
        <p class="temoins__text temoins__text-2"><?php the_field("temoins_2"); ?></p>
        <img src="<?php echo the_field("img_3"); ?>" class="temoins__img temoins__3">
        <p class="temoins__nom temoins__nom-3"><?php the_field("nom_3"); ?></p>
        <p class="temoins__text temoins__text-3"><?php the_field("temoins_3"); ?></p>
        <button class="temoins__btn"><?php the_field("btn"); ?></button>
      </div>
    </section>
    <!--Fin Section Témoignages-->

	
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

get_footer();
// Affiche footer.php
?>
