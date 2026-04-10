<?php
/**
 * Template 404 — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
get_header(); ?>
<div class="container" style="text-align:center;padding:8rem 1rem">
  <h1 style="font-size:5rem;font-family:var(--font-display)">404</h1>
  <p style="margin:1rem 0 2rem"><?php _e( 'Cette page n\'existe pas.', 'le-kasseria' ); ?></p>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary"><?php _e( 'Retour à l\'accueil', 'le-kasseria' ); ?></a>
</div>
<?php get_footer(); ?>
