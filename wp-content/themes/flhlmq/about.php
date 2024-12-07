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

<!-- Début de la section "About" -->
<div class="about">
    <!-- Affichage du thumbnail, titre et contenu de la page une seule fois -->
    <img class="about__img" src="<?php the_post_thumbnail_url(); ?>" />
    <h2 class="about__titre"><?php the_title(); ?></h2>
    <p class="about__info"><?php the_field("about_info"); ?></p>


    <!-- Tableau des champs ACF -->
    <?php 
    $abouts = [
      'about_1',
      'about_2',
    ];

    foreach ( $abouts as $about_field ) {
        $about = get_field( $about_field );
        if( $about ):
    ?>
        <!-- Affichage des informations liées à chaque champ ACF -->
            <!-- Vérifier et afficher l'image si elle existe -->
            <?php if ( !empty( $about['image']['url'] ) ): ?>
                <img class="about__img" src="<?php echo esc_url( $about['image']['url'] ); ?>" />
            <?php endif; ?>

            <!-- Vérifier et afficher le titre spécifique à ce champ ACF -->
            <?php if ( !empty( $about['title'] ) ): ?>
                <h2 class="about__titre"><?php echo esc_html( $about['title'] ); ?></h2>
            <?php endif; ?>

            <!-- Vérifier et afficher les descriptions spécifiques à ce champ ACF -->
            <div class="about__info">
                <?php 
                if ( !empty( $about['description_1'] ) ): ?>
                    <p class="about__p"><?php echo wp_kses_post( $about['description_1'] ); ?></p>
                <?php endif; ?>
                <br />
                <?php 
                if ( !empty( $about['description_2'] ) ): ?>
                    <p class="about__p"><?php echo wp_kses_post( $about['description_2'] ); ?></p>
                <?php endif; ?>
                <br />
                <?php 
                if ( !empty( $about['description_3'] ) ): ?>
                    <p class="about__p"><?php echo wp_kses_post( $about['description_3'] ); ?></p>
                <?php endif; ?>
                <br />
                <?php 
                if ( !empty( $about['description_4'] ) ): ?>
                    <p class="about__p"><?php echo wp_kses_post( $about['description_4'] ); ?></p>
                <?php endif; ?>
            </div>
            <!-- Vérifier et afficher l'image supplémentaire si elle existe -->
            <?php 
            if ( !empty( $about['image_1']['url'] ) ): ?>
                <img class="about__img" src="<?php echo esc_url( $about['image_1']['url'] ); ?>" />
            <?php endif; ?>

            <!-- Vérifier et afficher d'autres descriptions si elles existent -->
            <div class="about__info">
                <?php 
                if ( !empty( $about['description_5'] ) ): ?>
                    <p class="about__p"><?php echo wp_kses_post( $about['description_5'] ); ?></p>
                <?php endif; ?>
                <br />
                <?php 
                if ( !empty( $about['description_6'] ) ): ?>
                    <p class="about__p"><?php echo wp_kses_post( $about['description_6'] ); ?> <a href="https://flhlmq.com/sites/flhlmq.com/files/2022-09/R%C3%88GLEMENTS%20G%C3%89N%C3%89RAUX%20DE%20LA%20FLHLMQ-%202021.pdf">ici</a>!</p>
                <?php endif; ?>
                <br />
                <?php 
                if ( !empty( $about['description_7'] ) ): ?>
                    <p class="about__p"><?php echo wp_kses_post( $about['description_7'] ); ?></p>
                <?php endif; ?>
            </div>
    <?php endif; } ?>
</div> <!-- Fin de la section "About" -->

<?php 
else : // S'il n'y a pas de pages à afficher
    echo '<p>Aucun service trouvé</p>'; 
    get_template_part( 'partials/404' ); // Afficher le 404
endif;

get_footer(); // Affiche footer.php 
?>
