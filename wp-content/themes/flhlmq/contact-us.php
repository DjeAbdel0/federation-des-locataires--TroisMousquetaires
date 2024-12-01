<?php
/**
* Template Name: Contact Us
* Template Post Type: page
*/

get_header(); // Affiche header.php

if ( have_posts() ) :  // Est-ce que nous avons des pages à afficher ? 
	// Si oui, bouclons au travers les pages (logiquement, il n'y en aura qu'une)
the_post();

// Fetch les customField pour récupérer les informations du formulaire
$form_title = get_field( 'formulaire_title' );
$form_btn = get_field( 'formulaire_btn' );
$form_name = get_field( 'formulaire_name' );
$form_email = get_field( 'formulaire_email' );
$form_message = get_field( 'formulaire_message' );
?>

<?php
// Fetch les customField pour récupérer les informations du FLHLMQ
$phone_number = get_field( 'phone_number' );
$address = get_field( 'address' );
$fax = get_field( 'fax' );
$email = get_field( 'email' );
// Fetch les customField pour récupérer les icones des informations
$phone_icon = get_field( 'phone_icon' );
$address_icon = get_field( 'address_icon' );
$fax_icon = get_field( 'fax_icon' );
$email_icon = get_field( 'email_icon' );

?>

<!--  Section information-->
<div class = 'page-joindre'>
<div class = 'joindre-droit'>
<div class = 'joindre-droit__base'>
<h1 class = 'joindre-droit__base__h1'> <?php the_title(); //Titre de la page
?></h1>
<p> <?php the_content(); //Description de la page
?></p>
</div>
<div class = 'joindre-informations'>
<div class = 'joindre-informations__contact'>
<h1>
<i class = "bi <?php echo esc_attr($phone_icon); ?> joindre__i"></i> <!-- Affiche le icon du téléphone -->
<?php echo esc_html( $phone_number );
?> <!-- Affiche le téléphone -->
</h1>
<h1>





<i class = "bi <?php echo esc_attr($fax_icon); ?> joindre__i"></i> <!-- Affiche le icon du fax -->
<?php echo esc_html( $fax );
?> <!-- Affiche le fax -->
</h1>

<h1>
<i class = "bi <?php echo esc_attr($email_icon); ?> joindre__i"></i> <!-- Affiche le icon de l'email -->
<?php echo esc_html( $email );
?> <!-- Affiche l'email' -->
</h1>

<h1>
<i class = "bi <?php echo esc_attr($address_icon); ?> joindre__i"></i> <!-- Affiche le icon de l'adresse -->
<?php echo esc_html( $address );
?> <!-- Affiche l'adresse -->
</h1>

<h1 class = 'joindre-informations__facebook'><i class = 'bi bi-facebook joindre__i'></i><a href = 'https://www.facebook.com/flhlmq/?locale=fr_CA' target = '_blank'>Visiter la page</a></h1>

</div>

</div>
</div>
</div>


<!-- Contact Form Section -->
<div class = 'joindre-gauche'>
<div class = 'joindre-formulaire'>
<form class = 'joindre-formulaire__form' method = 'post' action = ''>
<?php if ( !empty( $form_title ) ) : // Si le champs "titre" n'est pas vide alors ...?> 
<h1 class = 'joindre-formulaire__titre'><?php echo esc_html( $form_title ); // Affiche le titre du formulaire
?></h1>
<?php endif;
?>

<?php if ( !empty( $form_name ) ) : //Si le champs "nom" n'est pas vide alors ... ?>
<label class = 'joindre-formulaire__label' for = 'nom'><?php echo esc_html( $form_name );// Affiche le nom du formulaire
?></label>
<div>
<input class = 'joindre-formulaire__nom' type = 'text' id = 'nom' name = 'nom' required placeholder = 'Votre nom'>
</div>
<?php endif;
?>

<?php if ( !empty( $form_email ) ) : //Si le champs "email" n'est pas vide alors ...?>
<label class = 'joindre-formulaire__label' for = 'email'><?php echo esc_html( $form_email );// Affiche l'email du formulaire
?></label>
<div>
<input class = 'joindre-formulaire__email' type = 'email' id = 'email' name = 'email' required placeholder = 'Votre email'>
</div>
<?php endif;
?>

<?php if ( !empty( $form_message ) ) : // Si le champs "message" n'est pas vide alors ...?>
<label class = 'joindre-formulaire__label' for = 'message'><?php echo esc_html( $form_message );// Affiche le message du formulaire
?></label>
<div>
<textarea class = 'joindre-formulaire__message' id = 'message' name = 'message' rows = '3' required placeholder = 'Je vous contacte pour ...'></textarea>
</div>
<?php endif;
?>

<div>
<button class = 'joindre-formulaire__btn' type = 'submit'><?php echo esc_html( $form_btn );// Affiche le btn du formulaire
?></button>
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
