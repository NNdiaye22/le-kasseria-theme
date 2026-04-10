<?php
/**
 * Header — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
require_once get_template_directory() . '/inc/menu-walker.php';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="light">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only" href="#main-content"><?php _e( 'Aller au contenu', 'le-kasseria' ); ?></a>

<header class="site-header" id="site-header" role="banner">
  <div class="header-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> — Accueil">
      <?php if ( has_custom_logo() ) :
          the_custom_logo();
      else : ?>
        <svg class="logo-svg" viewBox="0 0 140 44" fill="none" aria-label="Le Kasseria" width="140" height="44">
          <path d="M8 8 L8 36 M8 22 L20 12 M8 22 L22 36" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          <text x="30" y="30" font-family="'Cormorant Garant',Georgia,serif" font-size="22" font-weight="600" fill="currentColor" letter-spacing="0.5">Kasseria</text>
        </svg>
      <?php endif; ?>
    </a>
    <nav class="site-nav" id="site-nav" role="navigation" aria-label="<?php _e( 'Navigation principale', 'le-kasseria' ); ?>">
      <?php
      wp_nav_menu( [
          'theme_location' => 'primary',
          'menu_class'     => 'nav-items',
          'container'      => false,
          'walker'         => new Kasseria_Nav_Walker(),
          'fallback_cb'    => 'kasseria_fallback_nav',
      ] );
      ?>
    </nav>
    <div class="header-actions">
      <button class="theme-toggle" data-theme-toggle aria-label="<?php _e( 'Changer de thème', 'le-kasseria' ); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
      </button>
      <button class="hamburger" id="hamburger" aria-label="<?php _e( 'Ouvrir le menu', 'le-kasseria' ); ?>" aria-expanded="false" aria-controls="mobile-menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
  <div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="<?php _e( 'Menu mobile', 'le-kasseria' ); ?>">
    <?php
    wp_nav_menu( [
        'theme_location' => 'primary',
        'menu_class'     => 'mobile-nav-items',
        'container'      => false,
        'walker'         => new Kasseria_Nav_Walker(),
        'fallback_cb'    => false,
    ] );
    ?>
    <a href="tel:<?php echo preg_replace('/\s/', '', kasseria_opt('kasseria_telephone', '+33 09 56 95 90 92')); ?>" class="mobile-cta-btn"><?php _e( 'Commander', 'le-kasseria' ); ?></a>
  </div>
</header>

<main id="main-content">
<?php
function kasseria_fallback_nav() {
    $links = [ 'accueil' => __('Accueil','le-kasseria'), 'menu' => __('Menu','le-kasseria'), 'a-propos' => __('À Propos','le-kasseria'), 'contact' => __('Contact','le-kasseria') ];
    echo '<ul class="nav-items">';
    foreach ( $links as $anchor => $label ) {
        echo '<li class="nav-item"><a class="nav-link" href="#' . esc_attr($anchor) . '">' . esc_html($label) . '</a></li>';
    }
    $tel = kasseria_opt('kasseria_telephone','+33 09 56 95 90 92');
    echo '<li class="nav-item"><a class="nav-cta" href="tel:' . esc_attr(preg_replace('/\s/','',$tel)) . '">' . __('Commander','le-kasseria') . '</a></li>';
    echo '</ul>';
}
