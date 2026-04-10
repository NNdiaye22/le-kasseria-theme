<?php
/**
 * Section Hero — Four à bois Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$subtitle = get_theme_mod( 'kasseria_hero_subtitle', 'Cuisine turque au feu de bois · Viandes halal · Saint-Étienne' );
$tel      = kasseria_opt( 'kasseria_telephone', '+33 09 56 95 90 92' );
$tel_href = preg_replace( '/\s/', '', $tel );
?>
<section class="hero" id="accueil" aria-label="<?php _e( 'Présentation du restaurant', 'le-kasseria' ); ?>">
  <div class="hero-split">
    <div class="hero-content reveal">
      <span class="hero-eyebrow">
        <svg class="eyebrow-flame" viewBox="0 0 24 24" fill="none" width="16" height="16" aria-hidden="true"><path d="M12 2c0 0-4 4.5-4 9a4 4 0 0 0 8 0c0-4.5-4-9-4-9zM8.5 14c-.5-1.5 0-3 1-4.5 0 2 1.5 3 1.5 3s.5-1.5 1.5-2c0 1.5 1 2.5 1 3.5a3 3 0 0 1-5 0z" fill="currentColor"/></svg>
        <?php _e( 'Cuisine au feu de bois', 'le-kasseria' ); ?>
      </span>
      <h1 class="hero-title"><?php _e( 'L’authentique<br><em>saveur<br>ottomane</em>', 'le-kasseria' ); ?></h1>
      <p class="hero-desc"><?php echo esc_html( $subtitle ); ?></p>
      <div class="hero-actions">
        <a href="tel:<?php echo esc_attr( $tel_href ); ?>" class="btn-primary"><?php _e( 'Commander maintenant', 'le-kasseria' ); ?></a>
        <a href="#menu" class="btn-ghost"><?php _e( 'Voir le menu', 'le-kasseria' ); ?></a>
      </div>
      <div class="hero-values">
        <div class="hero-value-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="20" height="20" aria-hidden="true"><path d="M17 8C8 10 5.9 16.17 3.82 19.34L3 21h2c6-8 14-4 14-10 0-1.5-1-3-2-3z"/><path d="M9 19c0-1.66 2.24-3 5-3"/></svg>
          <span><?php _e( 'Feu de bois', 'le-kasseria' ); ?></span>
        </div>
        <div class="hero-value-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="20" height="20" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <span><?php _e( 'Halal certifié', 'le-kasseria' ); ?></span>
        </div>
        <div class="hero-value-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="20" height="20" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          <span><?php _e( 'Fait maison', 'le-kasseria' ); ?></span>
        </div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-img-wrap">
        <img
          src="https://images.unsplash.com/photo-1544025162-d76694265947?w=900&q=85&auto=format&fit=crop"
          alt="<?php _e( 'Plats grillés sortant d\'un four à bois au Kasseria', 'le-kasseria' ); ?>"
          width="900"
          height="1100"
          loading="eager"
          fetchpriority="high"
          class="hero-img"
        >
        <div class="hero-img-overlay" aria-hidden="true"></div>
        <div class="hero-badge-wood" aria-hidden="true">
          <svg viewBox="0 0 80 80" fill="none" width="80" height="80">
            <circle cx="40" cy="40" r="38" stroke="var(--color-accent)" stroke-width="1.5" stroke-dasharray="4 3"/>
            <text x="50%" y="36" text-anchor="middle" font-family="'Cormorant Garant',serif" font-size="9" font-weight="600" fill="var(--color-accent)" letter-spacing="1.5">CUIT AU</text>
            <text x="50%" y="50" text-anchor="middle" font-family="'Cormorant Garant',serif" font-size="9" font-weight="600" fill="var(--color-accent)" letter-spacing="1.5">FEU DE BOIS</text>
            <path d="M40 54 L40 60" stroke="var(--color-accent)" stroke-width="1" stroke-linecap="round"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-scroll" aria-hidden="true">
    <span class="scroll-line"></span>
    <span class="scroll-label"><?php _e( 'Découvrir', 'le-kasseria' ); ?></span>
  </div>
</section>
