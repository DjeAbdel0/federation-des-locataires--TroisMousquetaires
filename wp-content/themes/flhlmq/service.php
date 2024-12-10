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

// Array avec la liste de mes services (Custom FieldGroup)
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
    // Fetch les informations du service
    $service = get_field( $service_field );

    // verifier s'il y a de la data
    if ( $service ): ?>
        <div class="crr__contenue">
            <div class="role">
                <?php 
                // affiche les titres s'ils existent
                if ( !empty( $service['title'] ) ): ?>
                    <h3 class="role__titre__h3"><?php echo esc_html( $service['title'] ); ?></h3>
                <?php endif; ?>

                <?php 
                // affiche les images s'ils existent
                if ( !empty( $service['image'] ) ): ?>
                    <img class="role__titre__img" src="<?php echo esc_url( $service['image']['url'] ); ?>" alt="image" />
                <?php endif; ?>

                <?php 
                // affiche les titres s'ils existent
                if ( !empty( $service['description'] ) ): ?>
                    <p class="role__paragraphe"><?php echo wp_kses_post( $service['description'] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; 
}


else : // S'il n'y a pas de service affichez ce message
    echo '<p>Aucun service trouvé</p>'; 
    get_template_part( 'partials/404' ); // Affiche la page 404
endif;
?>

<div class="crr__fin">
    <br>
    <h3>Autres services</h3>
    <div class="page-service-crr">
        <?php
        // Array avec 2 services extra (Custom FieldGroup)
        $services_supp = [
            'serviceSupp_3',       // service 1
            'serviceSupp_2',       // service 2
        ];

        // Fetch les informations des 2 services et affichez leur informations
        foreach ( $services_supp as $service_field_supp ) {
            $serviceSupp  = get_field( $service_field_supp );  // Fetch les informations du service

            if ( $serviceSupp ): ?>
                <div class="page-service-crr__assos-crr">
                    <a href="<?php echo esc_url( home_url( '/se' ) ); //Chemin d'accès d'un service (CRR) ?>">
                        <?php 
                         // affiche les images s'ils existent
                        if ( !empty( $serviceSupp['image'] ) ) {
                            // If image is an array, use the URL directly
                            if ( is_array($serviceSupp['image']) && !empty($serviceSupp['image']['url']) ) {
                                $image_url = $serviceSupp['image']['url'];
                            } 
                            // S'il y a une image avec un ID et applique son chemin d'acces
                            elseif ( is_int($serviceSupp['image']) ) {
                                $image_url = esc_url($serviceSupp['image'], 'full');
                            }

                             // affiche les images si un lien est disponible
                            if ( !empty( $image_url ) ) {
                                echo '<img class="page-service-crr__assos-crr__image" src="' . esc_url( $image_url ) . '" alt="Service Image" />';
                            }
                        }
                        ?>
                    </a>

                    <?php 
                   // affiche les titres s'ils existent
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
get_footer(); // Affiche le footer
?>
