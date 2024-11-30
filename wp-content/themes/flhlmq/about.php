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

	<div class="about">
  <div class="about__img"> 
<?php the_post_thumbnail(); // Extrait de l'image?>
</div>
      <h2 class="about__titre"><?php the_title(); // Titre de la page ?></h2>

      <!-----Info sur la page------>
      <p class="about__info">
        <?php the_content(); // Contenu principal de la page ?>
      </p>
      
      <?php 
      // Tableau des champs ACF
      $abouts = [
        'about_1',
        'about_2',
      ];
      
      foreach ( $abouts as $about_field ) {
        $about = get_field( $about_field ); // Fetch the field dynamically
    
        if( $about ): ?>

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
    
                    <div class="about__info">
                      <?php 
                      // Verifier s'il y a une description et l'afficher
                      if ( !empty( $about['description'] ) ): ?>
                          <p class="about__p"><?php echo wp_kses_post( $about['description'] ); ?></p>
                      <?php endif; ?>
                      <br />
                      <?php 
                      // Verifier s'il y a une description et l'afficher
                      if ( !empty( $about['description'] ) ): ?>
                          <p class="about__p"><?php echo wp_kses_post( $about['description'] ); ?></p>
                      <?php endif; ?>
                      <br />
                      <?php 
                      // Verifier s'il y a une description et l'afficher
                      if ( !empty( $about['description'] ) ): ?>
                          <p class="about__p"><?php echo wp_kses_post( $about['description'] ); ?></p>
                      <?php endif; ?>
                      <br />
                      <?php 
                      // Verifier s'il y a une description et l'afficher
                      if ( !empty( $about['description'] ) ): ?>
                          <p class="about__p"><?php echo wp_kses_post( $about['description'] ); ?></p>
                      <?php endif; ?>
                    </div>

                    <?php 
                    // Verifier s'il y a une image et l'afficher
                    if ( !empty( $about['image']['url'] ) ): ?>
                        <img class="about__img" src="<?php echo esc_url( $about['image']['url'] ); ?>"/>
                    <?php endif; ?>

                    <div class="about__info">
                      <?php 
                      // Verifier s'il y a une description et l'afficher
                      if ( !empty( $about['description'] ) ): ?>
                          <p class="about__p"><?php echo wp_kses_post( $about['description'] ); ?></p>
                      <?php endif; ?>
                      <br />
                      <?php 
                      // Verifier s'il y a une description et l'afficher
                      if ( !empty( $about['description'] ) ): ?>
                          <p class="about__p"><?php echo wp_kses_post( $about['description'] ); ?></p>
                      <?php endif; ?>
                      <br />
                      <?php 
                      // Verifier s'il y a une description et l'afficher
                      if ( !empty( $about['description'] ) ): ?>
                          <p class="about__p"><?php echo wp_kses_post( $about['description'] ); ?></p>
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
