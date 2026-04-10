<?php
/**
 * Template : Page d'accueil
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
get_header();
get_template_part( 'template-parts/section', 'hero' );
get_template_part( 'template-parts/section', 'about' );
get_template_part( 'template-parts/section', 'gallery' );
get_template_part( 'template-parts/section', 'menu' );
get_template_part( 'template-parts/section', 'contact' );
get_footer();
