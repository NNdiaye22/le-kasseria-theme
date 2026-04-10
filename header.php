<?php
/**
 * Header — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$tel      = kasseria_opt( 'kasseria_telephone', '0956959092' );
$tel_href = 'tel:+33' . ltrim( preg_replace( '/[^0-9]/', '', $tel ), '0' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
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

<!-- ─── NAVIGATION ─── -->
<nav class="nav" id="nav" role="navigation" aria-label="<?php _e( 'Navigation principale', 'le-kasseria' ); ?>">

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" aria-label="Le Kasseria — Accueil">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true">
      <circle cx="16" cy="16" r="15" stroke="#c17b3a" stroke-width="1"/>
      <path d="M10 22 L16 8 L22 22" stroke="#c17b3a" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M12 18 H20" stroke="#c17b3a" stroke-width="1" stroke-linecap="round"/>
      <circle cx="16" cy="8" r="1.2" fill="#c17b3a"/>
    </svg>
    <span class="nav-logo-text">Le Kasseria</span>
  </a>

  <div class="nav-links">
    <a href="#accueil"><?php _e( 'Accueil',   'le-kasseria' ); ?></a>
    <a href="#apropos"><?php _e( 'À Propos',  'le-kasseria' ); ?></a>
    <a href="#galerie"><?php _e( 'Galerie',   'le-kasseria' ); ?></a>
    <a href="#menu"   ><?php _e( 'Menu',      'le-kasseria' ); ?></a>
    <a href="<?php echo esc_attr( $tel_href ); ?>" class="nav-cta"><?php _e( 'Commander', 'le-kasseria' ); ?></a>
  </div>

  <button class="nav-hamburger" id="hamburger"
    aria-label="<?php _e( 'Ouvrir le menu', 'le-kasseria' ); ?>"
    aria-expanded="false"
    aria-controls="mobile-menu">
    <span></span><span></span><span></span>
  </button>

</nav>

<!-- ─── MENU MOBILE ─── -->
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="<?php _e( 'Menu mobile', 'le-kasseria' ); ?>">
  <a href="#accueil" class="mobile-link"><?php _e( 'Accueil',  'le-kasseria' ); ?></a>
  <a href="#apropos" class="mobile-link"><?php _e( 'À Propos', 'le-kasseria' ); ?></a>
  <a href="#galerie" class="mobile-link"><?php _e( 'Galerie',  'le-kasseria' ); ?></a>
  <a href="#menu"    class="mobile-link"><?php _e( 'Menu',     'le-kasseria' ); ?></a>
  <a href="#contact" class="mobile-link"><?php _e( 'Contact',  'le-kasseria' ); ?></a>
  <a href="<?php echo esc_attr( $tel_href ); ?>" class="nav-cta" style="margin-top:1rem;">
    <?php _e( 'Commander', 'le-kasseria' ); ?>
  </a>
</div>

<main id="main-content">
