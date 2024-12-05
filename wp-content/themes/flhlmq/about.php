<?php 
/**
 * 	Template Name: about
 *  Template Post Type: page
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
	the_post(); 
?>

	
      
    <?php 
    // Tableau des champs ACF
    $abouts = [
      'about_1',
      'about_2',
    ];
      
    foreach ( $abouts as $about_field ) {
      $about = get_field( $about_field );
        if( $about ): ?>
        <!-----Début section à propos------>
  <div class="about">
      <?php the_post_thumbnail('medium', array('class' => 'about__image')) ?>
      <h2 class="about__titre"><?php the_title(); // Titre de la page ?></h2>

      <!-----Info sur la page------>
      <p class="about__info"><?php the_content();?></p>
        <!-----image a propos------>
      <?php 
      // Verifier s'il y a une image et l'afficher
      if ( !empty( $about['image']['url'] ) ): ?>
      <img class="about__img" src="<?php echo esc_url( $about['image']['url'] ); ?>"/>
      <?php endif; ?>
      <?php 
      // Verifier s'il y a un titre et l'afficher
      if ( !empty( $about['title'] ) ): ?>
      <h2 class="about__titre" ><?php echo esc_html( $about['title'] ); ?></h2>
      <?php endif; ?>
      <!-----autre info------>
      <div class="about__info">
        <?php 
        // Verifier s'il y a une description et l'afficher
        if ( !empty( $about['description_1'] ) ): ?>
          <p class="about__p"><?php echo wp_kses_post( $about['description_1'] ); ?></p>
        <?php endif; ?>
        <br />
        <?php 
        // Verifier s'il y a une description et l'afficher
        if ( !empty( $about['description_2'] ) ): ?>
          <p class="about__p"><?php echo wp_kses_post( $about['description_2'] ); ?></p>
        <?php endif; ?>
        <br />
        <?php 
        // Verifier s'il y a une description et l'afficher
        if ( !empty( $about['description_3'] ) ): ?>
          <p class="about__p"><?php echo wp_kses_post( $about['description_3'] ); ?></p>
        <?php endif; ?>
        <br />
        <?php 
        // Verifier s'il y a une description et l'afficher
        if ( !empty( $about['description_4'] ) ): ?>
        <p class="about__p"><?php echo wp_kses_post( $about['description_4'] ); ?></p>
        <?php endif; ?>
      </div>
      <?php 
      // Verifier s'il y a une image et l'afficher
      if ( !empty( $about['image_1']['url'] ) ): ?>
      <img class="about__img" src="<?php echo esc_url( $about['image_1']['url'] ); ?>"/>
      <?php endif; ?>
      <div class="about__info">
      <?php 
      // Verifier s'il y a une description et l'afficher
      if ( !empty( $about['description_5'] ) ): ?>
          <p class="about__p"><?php echo wp_kses_post( $about['description_5'] ); ?></p>
      <?php endif; ?>
        <br />
        <?php 
        // Verifier s'il y a une description et l'afficher
        if ( !empty( $about['description_6'] ) ): ?>
        <p class="about__p"><?php echo wp_kses_post( $about['description_6'] ); ?> <a href="https://flhlmq.com/sites/flhlmq.com/files/2022-09/R%C3%88GLEMENTS%20G%C3%89N%C3%89RAUX%20DE%20LA%20FLHLMQ-%202021.pdf">ici</a>!</p>
        <?php endif; ?>
        <br />
        <?php 
        // Verifier s'il y a une description et l'afficher
        if ( !empty( $about['description_7'] ) ): ?>
        <p class="about__p"><?php echo wp_kses_post( $about['description_7'] ); ?></p>
        <?php endif; ?>
      </div>
    </div>
        <?php endif;
    }
      

else : // Sil y a rien afficher ce message
  echo '<p>Aucun service trouvé</p>'; 
  get_template_part( 'partials/404' ); //Afficher le 404
endif;

get_footer(); // Affiche footer.php 
?>
