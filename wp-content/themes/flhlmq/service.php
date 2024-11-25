<?php 
/**
 * Template Name: unService
 * Template Post Type: services
 * 	
 */

get_header(); // Displays header.php

if ( have_posts() ) : // Check if there are any posts to display
    while ( have_posts() ) : the_post();
?>

<?php the_title(); ?>
<?php the_content(); ?>
<?php the_post_thumbnail(); ?>

<?php
// Retrieve the "service_list" field, which contains an array of services
$service_list = get_field('service_list');
if( $service_list ):
    echo '<p>Service List Found!</p>'; // Debugging message to check if the field exists
    ?>
    <div id="services-list">
        <?php foreach( $service_list as $service ): ?>
            <div class="service-item">
                <?php
                   
                    // Var_dump to inspect the data
                    var_dump($service);
                ?>
				<P> <?php if( !empty($service['services_list_description']) ): ?>
                    <p><?php echo ( $service['services_list_description'] ); ?></p>
                <?php endif; ?>
				</P>
			
                <?php if( !empty($service['services_list_image']) ): ?>
                    <img src="<?php echo esc_url( $service['services_list_image']); ?>" alt="<?php echo esc_attr( $service['services_list_image'] ); ?>" />
                <?php endif; ?>
                
                <?php if( !empty($service['services_list_title']) ): ?>
                    <h3><?php echo esc_html( $service['services_list_title'] ); ?></h3>
                <?php endif; ?>
                
                <?php if( !empty($service['services_list_btn']) ): ?>
                    <a href="#" class="btn"><?php echo esc_html( $service['services_list_btn'] ); ?></a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php
else :
    echo '<p>No services found.</p>'; // Debugging message to check if the field is empty
endif;
?>

<?php endwhile; // End of post loop

else : // If no posts are found
    get_template_part( 'partials/404' ); // Display 404.php
endif;

get_footer(); // Displays footer.php
?>
