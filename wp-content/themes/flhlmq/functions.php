<?php
	/*-----------------------------------------------------------------------------------*/
	/* Ce fichier est présent sur chaque page
	/* Vous pouvez y ajouter des fonctions au besoin
	/*-----------------------------------------------------------------------------------*/

/* --------------------------------
Ajoute les vignettes dans les posts de type Article */
add_theme_support( 'post-thumbnails' );


/* --------------------------------
Déclare le menu principal */
register_nav_menus( 
	array(
		/* 
			1. 'main-menu' = Nom dans le code
			2. 'Menu principal' = Nom dans l'admin
			3. 'Menu principal du site' = Description dans l'admin */
		'main-menu' => __( 'Menu principal', 'Menu principal du site' ), 
		/* Dupliquer cette ligne si vous désirez déclarer d'autres menus */
	)
);


/* --------------------------------
Function déclarant la barre latérale principale */
function add_sidebars() {
	register_sidebar(array(	
		/* 
			1. 'main-sidebar' = Nom dans le code
			2. 'Barre laterale principale' = Nom dans l'admin
			3. 'Barre latérale principale du site' = Description dans l'admin */
		'main-sidebar' => __( 'Barre laterale principale', 'Barre latérale principale du site' ), 
		/* Dupliquer cette ligne si vous désirez déclarer d'autres sidebars */
	));
} 
/* Appel la fonction déclarant la barre latérale au moment de l'init des widgets */
add_action('widgets_init', 'add_sidebars');


/* -------------------------------- 
Function ajoutant les styles et scripts */
function add_style_and_js()  { 
	/* Ajoute le fichier style.css du theme WordPress actif 
	  1. 'default' = ID de référence à donner au à la feuille de style
		2. get_template_directory_uri() . '/style.css' = Chemin où ce trouve le fichier CSS en question
	*/
	wp_enqueue_style('default', get_template_directory_uri() . './style.css?v='.time());

	/* Pour ajoutez une feuille de style supplémentaire, copier la ligne précédente et ajuster le chemin du fichier de façon relative vers votre nouveau fichier CSS */

	/* Ajoute le fichier main.js du theme WordPress actif 
	   1. 'default' = ID de référence à donner au script
		 2. get_template_directory_uri() . '/main.js' = Chemin où ce trouve le fichier JS en question
		 3. array() = Liste des dépendances de ce script (généralement vide)
		 4. false = Si un no de version doit être ajouté (généralement à false)
		 5. true = Est-ce que le script doit-être ajouté à la fin du body. Si mis à false le script est ajouter dans le head à la place
	*/
	wp_enqueue_script('default', get_template_directory_uri() . '/main.js?v='.time(), array(), false, true);

	/* Pour ajoutez un script, copier la ligne précédente et ajuster le chemin de façon relative vers votre nouveau fichier JS */
}
// Enqueue FontAwesome in your theme
function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_bootstrap_icons() {
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_icons');

function theme_enqueue_styles() {
    // Charger le CSS de Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    
    // Charger le CSS de votre thème
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    
    // Charger le script jQuery (nécessaire pour Bootstrap)
    wp_enqueue_script('jquery');
    
    // Charger le JavaScript de Bootstrap (assurez-vous que jQuery est chargé avant Bootstrap)
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Fonction pour ajouter le CDN de GSAP
function enqueue_gsap_cdn() {
    // Ajouter le script GSAP via le CDN
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js', array(), null, true);
}

// Ajouter GSAP à l'action wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'enqueue_gsap_cdn');


/* Appel de la fonction ajoutant les styles et scripts */
add_action('wp_enqueue_scripts', 'add_style_and_js'); 

function create_post_type() {
	register_post_type('services', 
	  array(
		'labels' => array(
		  'name' => _x('Services', 'Nom générique'),
		  'singular_name' => _x('Service', 'Au singulier'),
		  'menu_name' => __('Services'),
		  'all_items' => __('Tous les services'),
		  'view_item' => __('Voir les services'),
		  'add_new_item' => __('Ajouter un nouveau service'),
		  'add_new' => __('Ajouter'),
		  'edit_item' => __('Editer le service'),
		  'update_item' => __('Modifier le service'),
		  'search_items' => __('Rechercher un service'),
		  'not_found' => __('Non trouvé'),
		  'not_found_in_trash' => __('Non trouvé dans la corbeille'),
		),
		'supports' => array(
		  'title', 
		  'editor', 
		  'author', 
		  'thumbnail', 
		  'custom-fields',
		),
		'show_in_rest' => true,
		'public' => true,
		'has_archive' => true,
	  )
	);

	register_post_type('nouvelles', 
	array(
	  'labels' => array(
		'name' => _x('Nouvelles', 'Nom générique'),
		'singular_name' => _x('Nouvelle', 'Au singulier'),
		'menu_name' => __('Nouvelles'),
		'all_items' => __('Tous les nouvelles'),
		'view_item' => __('Voir les nouvelles'),
		'add_new_item' => __('Ajouter une nouvelle'),
		'add_new' => __('Ajouter'),
		'edit_item' => __('Editer la nouvelle'),
		'update_item' => __('Mettre à jour la nouvelle'),
		'search_items' => __('Rechercher une nouvelle'),
		'not_found' => __('Non trouvé'),
		'not_found_in_trash' => __('Non trouvé dans la corbeille'),
	  ),
	  'supports' => array(
		'title', 
		'editor', 
		'author', 
		'thumbnail', 
		'custom-fields',
	  ),
	  'show_in_rest' => true,
	  'public' => true,
	  'has_archive' => true,
	)
  );
}
  
  add_action('init', 'create_post_type');

  function add_acf_to_rest_api() {
    // Ajouter les champs ACF dans l'API REST
    register_rest_field('post', 'acf', array(
        'get_callback' => function($post_arr) {
            return get_fields($post_arr['id']);
        },
        'update_callback' => null,
        'schema' => null,
    ));
}
add_action('rest_api_init', 'add_acf_to_rest_api');

function add_news_microdata() {
    if (is_singular('nouvelles')) { // Vérifie que c'est une page du CPT "nouvelles"
        global $post;

        // Récupérer les données dynamiques
        $post_title = get_the_title($post->ID);
        $post_date = get_the_date('c', $post->ID);
        $post_modified = get_the_modified_date('c', $post->ID);
        $post_thumbnail = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID) : '';
        $post_author = get_the_author_meta('display_name', $post->post_author);
        $post_description = wp_strip_all_tags(get_the_excerpt($post->ID));
        $post_url = get_permalink($post->ID);

        // Générer le JSON-LD
        ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "<?php echo esc_js($post_title); ?>",
            "datePublished": "<?php echo esc_js($post_date); ?>",
            "dateModified": "<?php echo esc_js($post_modified); ?>",
            "image": "<?php echo esc_js($post_thumbnail); ?>",
            "author": {
                "@type": "Person",
                "name": "<?php echo esc_js($post_author); ?>"
            },
            "description": "<?php echo esc_js($post_description); ?>",
            "url": "<?php echo esc_js($post_url); ?>"
        }
        </script>
        <?php
    }
}
add_action('wp_head', 'add_news_microdata');
