<?php 
/**
 * Template Name: unService
 * Template Post Type: services
 */

get_header(); // Affiche header.php

if ( have_posts() ) : // Est-ce que nous avons des pages à afficher ? 
    the_post(); 
?>

<div class="crr">
    <div class="crr__grosTitre">
        <h1><?php the_title(); // Titre de la page?></h1> 
    </div>
    <div class="crr__grosImg">
    <?php if ( has_post_thumbnail() ) : ?>
    <img src="<?php echo get_the_post_thumbnail_url( null, 'full' ); ?>" alt="<?php the_title(); ?>" class="custom-thumbnail-class">
<?php endif; ?>

    </div>
    <div class="crr__intro">
        <?php the_content();  // Description de la page?>
    </div>
</div>

<?php

// Array with the list of my services (Custom FieldGroup)
$services = [
    'service_list',     // service 1
    'service_list_2',     // service 2
    'service_list_3',     // service 3
    'service_list_4',     // service 4
    'service_list_5',     // service 5
    'service_list_6',     // service 6
    'service_list_7',     // service 7
    'service_list_8',     // service 8
];


foreach ( $services as $service_field ) {
    // Fetch the service data dynamically
    $service = get_field( $service_field );

    // Ensure that there is data for the service
    if ( $service ): ?>
        <div class="crr__contenue">
            <div class="role">
                <?php 
                // Display title if it exists
                if ( !empty( $service['title'] ) ): ?>
                    <h3 class="role__titre__h3"><?php echo esc_html( $service['title'] ); ?></h3>
                <?php endif; ?>

                <?php 
                // Display image if it exists
                if ( !empty( $service['image'] ) ): ?>
                    <img class="role__titre__img" src="<?php echo esc_url( $service['image']['url'] ); ?>" alt="image" />
                <?php endif; ?>

                <?php 
                // Display description if it exists
                if ( !empty( $service['description'] ) ): ?>
                    <p class="role__paragraphe"><?php echo wp_kses_post( $service['description'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; 
}


else : // If no service found, display a message
    echo '<p>Aucun service trouvé</p>'; 
    get_template_part( 'partials/404' ); // Display the 404 page
endif;
?>

<div class="crr__fin">
    <br>
    <h3>Autres services</h3>
    <div class="page-service-crr">
        <?php
        // Array with additional services (Custom FieldGroup)
        $services_supp = [
            'serviceSupp_3',       // service 1
            'serviceSupp_2',       // service 2
        ];

        // Loop through each additional service to display
        foreach ( $services_supp as $service_field_supp ) {
            $serviceSupp  = get_field( $service_field_supp ); // Dynamically fetch the field

            if ( $serviceSupp ): ?>
                <div class="page-service-crr__assos-crr">
                    <a href="<?php echo esc_url( home_url( '/se' ) ); //Chemin d'accès d'un service (CRR) ?>">
                        <?php 
                        // Check if there's an image and display it
                        if ( !empty( $serviceSupp['image'] ) ) {
                            // If image is an array, use the URL directly
                            if ( is_array($serviceSupp['image']) && !empty($serviceSupp['image']['url']) ) {
                                $image_url = $serviceSupp['image']['url'];
                            } 
                            // If image is an ID, get the URL using wp_get_attachment_image_url()
                            elseif ( is_int($serviceSupp['image']) ) {
                                $image_url = esc_url($serviceSupp['image'], 'full');
                            }

                            // Display the image if the URL is available
                            if ( !empty( $image_url ) ) {
                                echo '<img class="page-service-crr__assos-crr__image" src="' . esc_url( $image_url ) . '" alt="Service Image" />';
                            }
                        }
                        ?>
                    </a>

                    <?php 
                    // Check if there's a title and display it
                    if ( !empty( $serviceSupp['titre'] ) ): ?>
                        <p class="page-service-crr__nom-crr"><?php echo esc_html( $serviceSupp['titre'] ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif;
        }
        ?>
    </div>
</div>

<?php
get_footer(); // Display the footer
?>
