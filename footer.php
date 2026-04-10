<?php
/**
 * Footer — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$tel     = kasseria_opt( 'kasseria_telephone', '+33 09 56 95 90 92' );
$adresse = kasseria_opt( 'kasseria_adresse',   '9 rue Pierre Termier, 42100 Saint-Étienne' );
$maps    = kasseria_opt( 'kasseria_google_maps','https://maps.google.com/?q=9+rue+Pierre+Termier+42100+Saint-Etienne' );
$insta   = kasseria_opt( 'kasseria_instagram', '#' );
$fb      = kasseria_opt( 'kasseria_facebook',  '#' );
?>

</main>

<footer class="site-footer" role="contentinfo">
  <div class="footer-inner">
    <div class="footer-brand">
      <svg class="footer-logo" viewBox="0 0 140 44" fill="none" width="120" height="38" aria-label="Le Kasseria">
        <path d="M8 8 L8 36 M8 22 L20 12 M8 22 L22 36" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        <text x="30" y="30" font-family="'Cormorant Garant',Georgia,serif" font-size="22" font-weight="600" fill="currentColor" letter-spacing="0.5">Kasseria</text>
      </svg>
      <p class="footer-tagline"><?php _e( 'Cuisine turque au feu de bois · Viandes halal · Saint-Étienne', 'le-kasseria' ); ?></p>
    </div>
    <div class="footer-col">
      <h3 class="footer-col-title"><?php _e( 'Contact', 'le-kasseria' ); ?></h3>
      <ul class="footer-list">
        <li><a href="tel:<?php echo esc_attr( preg_replace( '/\s/', '', $tel ) ); ?>" class="footer-link"><i data-lucide="phone" aria-hidden="true"></i> <?php echo $tel; ?></a></li>
        <li><a href="<?php echo esc_url( $maps ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link"><i data-lucide="map-pin" aria-hidden="true"></i> <?php echo $adresse; ?></a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h3 class="footer-col-title"><?php _e( 'Horaires', 'le-kasseria' ); ?></h3>
      <ul class="footer-list footer-list--horaires">
        <?php foreach ( kasseria_get_horaires() as $h ) : ?>
          <li class="<?php echo $h['ferme'] ? 'horaire--ferme' : ''; ?>">
            <span class="horaire-jour"><?php echo esc_html( $h['jour'] ); ?></span>
            <span class="horaire-heures"><?php echo esc_html( $h['heures'] ); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="footer-col">
      <h3 class="footer-col-title"><?php _e( 'Suivez-nous', 'le-kasseria' ); ?></h3>
      <div class="footer-social">
        <?php if ( $insta !== '#' ) : ?>
          <a href="<?php echo esc_url( $insta ); ?>" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Instagram"><i data-lucide="instagram" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if ( $fb !== '#' ) : ?>
          <a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Facebook"><i data-lucide="facebook" aria-hidden="true"></i></a>
        <?php endif; ?>
        <a href="<?php echo esc_url( $maps ); ?>" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Google Maps"><i data-lucide="map" aria-hidden="true"></i></a>
      </div>
      <?php wp_nav_menu( [ 'theme_location' => 'footer', 'menu_class' => 'footer-menu-items', 'container' => false, 'depth' => 1, 'fallback_cb' => false ] ); ?>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Tous droits réservés.','le-kasseria'); ?> — <?php _e('Thème conçu par','le-kasseria'); ?> <a href="https://github.com/NNdiaye22" target="_blank" rel="noopener noreferrer" class="footer-credit">2N</a></p>
    <p class="footer-halal"><i data-lucide="shield-check" aria-hidden="true"></i> <?php _e('Viandes 100 % halal certifié','le-kasseria'); ?></p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
