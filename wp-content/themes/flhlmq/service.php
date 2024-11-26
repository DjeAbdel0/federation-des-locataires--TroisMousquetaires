<?php 
/**
 * Template Name: unService
 * Template Post Type: services
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
    // Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
    the_post(); 
?>

<div class="crr">
    <div class="crr__grosTitre">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="crr__grosImg">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="crr__intro">
        <?php the_content(); ?>
    </div>
</div>

<?php

// Array avec la liste de mes service (Custom FieldGroup)
$services = [
    'service_list',       // service 1
    'service_list_2',     // service 2
    'service_list_3',     // service 3
    'service_list_4',     // service 4
    'service_list_5',     // service 5
    'service_list_6',     // service 6
    'service_list_7',     // service 7
    'service_list_8',     // service 8
    
];

foreach ( $services as $service_field ) {
    $service = get_field( $service_field ); // Fetch the field dynamically

    if( $service ): ?>
        <div class="crr__contenue">
            <div class="role">
                <?php 
                // Verifier s'il y a un titre et l'afficher
                if ( !empty( $service['title'] ) ): ?>
                    <h3><?php echo esc_html( $service['title'] ); ?></h3>
                <?php endif; ?>

                <?php 
                // Verifier s'il y a une image et l'afficher
                if ( !empty( $service['image']['url'] ) ): ?>
                    <img src="<?php echo esc_url( $service['image']['url'] ); ?>" alt="<?php echo esc_attr( $service['image']['alt'] ); ?>" />
                <?php endif; ?>

                <?php 
                // Verifier s'il y a une description et l'afficher
                if ( !empty( $service['description'] ) ): ?>
                    <p class="role__paragraphe"><?php echo wp_kses_post( $service['description'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif;
}

else : // Sil y a rien afficher ce message
    echo '<p>Aucun service trouvé</p>'; 
    get_template_part( 'partials/404' ); //Afficher le 404
endif;

get_footer(); // Montrer le footer
?>
