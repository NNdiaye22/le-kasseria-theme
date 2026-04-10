<?php
/**
 * Template fallback
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
if ( is_front_page() ) { get_template_part( 'front-page' ); return; }
get_header();
?>
<div class="container" style="padding-top:8rem;padding-bottom:4rem">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="entry-content"><?php the_content(); ?></div>
    </article>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
