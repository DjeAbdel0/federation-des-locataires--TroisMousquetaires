<?php
/**
* Template Name: Contact Us
* Template Post Type: page
*/

get_header();
// Display header.php

if ( have_posts() ) : // Check if there are posts to display
// Loop through the posts ( there should only be one )
the_post();

// Fetch custom fields before displaying the form
$form_title = get_field( 'formulaire_title' );

$form_name = get_field( 'formulaire_name' );
$form_email = get_field( 'formulaire_email' );
$form_message = get_field( 'formulaire_message' );
?>

<?php
// Retrieve phone number and selected icon
$phone_number = get_field( 'phone_number' );
// ACF field for phone number
$address = get_field( 'address' );
// ACF field for address
$fax = get_field( 'fax' );
// ACF field for phone number
$email = get_field( 'email' );
// ACF field for address

$phone_icon = get_field( 'phone_icon' );
// ACF field for phone icon ( select field )
$address_icon = get_field( 'address_icon' );
// ACF field for address icon ( select field )
$fax_icon = get_field( 'fax_icon' );
// ACF field for phone icon ( select field )
$email_icon = get_field( 'email_icon' );

?>

<!-- Information Section -->
<div class = 'joindre-informations'>
<div class = 'joindre-informations__contact'>
<div class = 'joindre-droit'>
<div class = 'joindre-droit__base'>
<h1 class = 'joindre-droit__base__h1'> <?php the_title();
?></h1>
<p> <?php the_content();
?></p>
</div>
<div class = 'joindre-informations'>
<div class = 'joindre-informations__contact'>
<h1>
<i class = "bi <?php echo esc_attr($phone_icon); ?> joindre__i"></i> <!-- Display the icon -->
<?php echo esc_html( $phone_number );
?> <!-- Display the phone number -->
</h1>
<h1>





<i class = "bi <?php echo esc_attr($fax_icon); ?> joindre__i"></i> <!-- Display the icon -->
<?php echo esc_html( $fax );
?> <!-- Display the phone number -->
</h1>

<h1>
<i class = "bi <?php echo esc_attr($email_icon); ?> joindre__i"></i> <!-- Display the icon -->
<?php echo esc_html( $email );
?> <!-- Display the phone number -->
</h1>

<h1>
<i class = "bi <?php echo esc_attr($address_icon); ?> joindre__i"></i> <!-- Display the icon -->
<?php echo esc_html( $address );
?> <!-- Display the phone number -->
</h1>

<h1 class = 'joindre-informations__facebook'><i class = 'bi bi-facebook joindre__i'></i><a href = 'https://www.facebook.com/flhlmq/?locale=fr_CA' target = '_blank'>Visiter la page</a></h1>

</div>

</div>
</div>
</div>
</div>

<!-- Contact Form Section -->
<div class = 'joindre-gauche'>
<div class = 'joindre-formulaire'>
<form class = 'joindre-formulaire__form' method = 'post' action = ''>
<?php if ( !empty( $form_title ) ) : ?>
<h1 class = 'joindre-formulaire__titre'><?php echo esc_html( $form_title );
?></h1>
<?php endif;
?>

<?php if ( !empty( $form_name ) ) : ?>
<label class = 'joindre-formulaire__label' for = 'nom'><?php echo esc_html( $form_name );
?></label>
<div>
<input class = 'joindre-formulaire__nom' type = 'text' id = 'nom' name = 'nom' required placeholder = 'Votre nom'>
</div>
<?php endif;
?>

<?php if ( !empty( $form_email ) ) : ?>
<label class = 'joindre-formulaire__label' for = 'email'><?php echo esc_html( $form_email );
?></label>
<div>
<input class = 'joindre-formulaire__email' type = 'email' id = 'email' name = 'email' required placeholder = 'Votre email'>
</div>
<?php endif;
?>

<?php if ( !empty( $form_message ) ) : ?>
<label class = 'joindre-formulaire__label' for = 'message'><?php echo esc_html( $form_message );
?></label>
<div>
<textarea class = 'joindre-formulaire__message' id = 'message' name = 'message' rows = '3' required placeholder = 'Je vous contacte pour ...'></textarea>
</div>
<?php endif;
?>

<div>
<button class = 'joindre-formulaire__btn' type = 'submit'>Envoyer</button>
</div>
</form>
</div>
</div>

<?php
else : // If no posts are found
echo '<p>Aucun service trouvé</p>';

get_template_part( 'partials/404' );
// Display the 404 template
endif;

get_footer();
// Display footer
?>
