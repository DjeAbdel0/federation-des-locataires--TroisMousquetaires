<?php
/*-----------------------------------------------------------------------------------*/
/* Affiche l'entête (Header) sur toutes vos pages
/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <title>
    <?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
  <!-- Section Bannière -->
  <section class="banniere">
    <div class="bannière__contenu">
      <h5>Site scolaire qui refait l'interface du site de la FLHLMQ</h5>
      <a href="https://flhlmq.com/fr">Site officiel du client</a>
    </div>
    <button class="btn-fermer">X</button>
  </section>
  <!-- Fin Section Bannière -->

  <!-- Barre de Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <a href="<?php echo esc_url( home_url( '/' ) ); //Lien du logo vers la page d'acceuil ?>" class="navbar-brand"> 
      <img src="<?php echo get_template_directory_uri(); //Chemin d'accès de l'image ?>/assets/logo/logo_nouveau.png" alt="Logo" class="logo_nav">
    </a>
    <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarContent" class="collapse navbar-collapse">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a href="<?php echo esc_url( home_url( '/news-hub' ) );//Chemin d'accès de news-hub ?>" class="nav-link font-weight-bold text-uppercase">Nouvelles</a></li>
        <li class="nav-item dropdown megamenu">
          <a id="megamenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle font-weight-bold text-uppercase">Services</a>
          <div class="dropdown-menu border-0 p-0 m-0">
            <div class="container navbar__dropmenuCouleur">
              <div class="row rounded-0 m-0 shadow-sm">
                <div class="col-lg-7 col-xl-8">
                  <div class="p-4">
                    <div class="row">
                      <div class="col-lg-6 mb-4">
                        <ul class="list-unstyled">
                          <li class="nav-item"><a href="<?php echo esc_url( home_url( '/se' ) ); //Chemin d'accès de services-hub ?>" class="nav-link text-small pb-0">Tous les services</a></li>
                          <li class="nav-item"><a href="<?php echo esc_url( home_url( '/services/association/' ) ); //Chemin d'accès d'un service (CRR) ?>" class="nav-link text-small pb-0">Crr</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-small pb-0">Service 2</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-small pb-0">Service 3</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item"><a href="<?php echo esc_url( home_url( '/team' ) ); //Chemin d'accès de team ?>" class="nav-link font-weight-bold text-uppercase">Équipe</a></li>
        <li class="nav-item"><a href="<?php echo esc_url( home_url( '/contactez-nous' ) ); //Chemin d'accès de contatc-us ?>" class="nav-link font-weight-bold text-uppercase">Nous joindre</a></li>
        <li class="nav-item"><a href="<?php echo esc_url( home_url( '/about' ) ); //Chemin d'accès de about ?>" class="nav-link font-weight-bold text-uppercase">À propos</a></li>
        
        <form role="search" aria-label="Site search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <input type="search" class="navbar__search" placeholder="Search..." aria-label="Search" name="s" value="<?php echo get_search_query();  //Chemin d'accès de la abrre de recherche   ?>">
          <button type="submit" aria-label="Submit search">
            <i class="bi bi-search"></i>
          </button>
        </form>
        
        <li class="nav-item">
          <a href="#" class="nav-link font-weight-bold text-uppercase"><i class="bi bi-person-fill"></i></a>
        </li>
      </ul>
      <a href="https://flhlmq.com/fr/publication/adhesion-et-abonnement">
        <button class="cta">Devenir membre</button>
      </a>
    </div>
  </nav>
  <!-- Fin Barre de Navigation -->

</header>

<main><!-- Débute le contenu principal de notre site -->
