<?php
/**
 * Section Hero — Le Kasseria
 */
defined( 'ABSPATH' ) || exit;
$subtitle = get_theme_mod( 'kasseria_hero_subtitle', 'Cuisine turque au feu de bois · Viandes halal · Saint-Étienne' );
$tel      = kasseria_opt( 'kasseria_telephone', '+33 09 56 95 90 92' );
$tel_href = preg_replace( '/\s/', '', $tel );
?>
<section class="hero" id="accueil" aria-label="<?php _e( 'Présentation du restaurant', 'le-kasseria' ); ?>">

  <div class="hero-content">
    <div class="hero-eyebrow">
      <span class="hero-eyebrow-line" aria-hidden="true"></span>
      <span class="label"><?php _e( 'Restaurant Turc · Saint-Étienne', 'le-kasseria' ); ?></span>
    </div>
    <h1 class="hero-title">
      <?php _e( 'L'authentique<br><em>saveur<br>ottomane</em>', 'le-kasseria' ); ?>
    </h1>
    <p class="hero-subtitle"><?php echo esc_html( $subtitle ); ?></p>
    <div class="hero-actions">
      <a href="tel:<?php echo esc_attr( $tel_href ); ?>" class="btn-copper">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 8.81a19.79 19.79 0 01-3.07-8.72A2 2 0 012 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 9.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        <?php _e( 'Commander maintenant', 'le-kasseria' ); ?>
      </a>
      <a href="#menu" class="btn-ghost"><?php _e( 'Voir le menu', 'le-kasseria' ); ?></a>
    </div>
  </div>

  <div class="hero-image-wrap">
    <img
      src="https://user-gen-media-assets.s3.amazonaws.com/gpt4o_images/e8dbf617-11fe-48f8-8041-ffa3836b5ac5.png"
      alt="<?php _e( 'Plat signature du restaurant Le Kasseria — cuisine ottomane au feu de bois', 'le-kasseria' ); ?>"
      width="900"
      height="1100"
      loading="eager"
      fetchpriority="high"
    />
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <span class="hero-scroll-text"><?php _e( 'Découvrir', 'le-kasseria' ); ?></span>
    <span class="hero-scroll-line"></span>
  </div>

</section>
