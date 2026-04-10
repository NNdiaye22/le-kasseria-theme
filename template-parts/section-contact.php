<?php
/**
 * Section CTA / Contact — Le Kasseria
 */
defined( 'ABSPATH' ) || exit;
$tel      = kasseria_opt( 'kasseria_telephone', '+33 09 56 95 90 92' );
$tel_href = preg_replace( '/\s/', '', $tel );
?>
<section id="contact" class="cta-section" aria-label="<?php _e( 'Commander ou réserver', 'le-kasseria' ); ?>">
  <div class="cta-bg" aria-hidden="true">
    <img
      src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/0aa6c1c30b8237910fa85afbf7b3259690bbea00.jpg"
      alt=""
      width="1280" height="896"
      loading="lazy"
    />
  </div>
  <div class="container">
    <div class="cta-content">
      <span class="label reveal"><?php _e( 'Commandez maintenant', 'le-kasseria' ); ?></span>
      <h2 class="cta-title reveal reveal-delay-1">
        <?php _e( 'Prêt à vous<br>régaler ce soir ?', 'le-kasseria' ); ?>
      </h2>
      <p class="cta-sub reveal reveal-delay-2">
        <?php _e( 'Appelez-nous pour commander votre table ou passer commande à emporter. Livraison disponible sur Saint-Étienne et ses environs.', 'le-kasseria' ); ?>
      </p>
      <div class="cta-actions reveal reveal-delay-3">
        <a href="tel:<?php echo esc_attr( $tel_href ); ?>" class="btn-large">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 8.81a19.79 19.79 0 01-3.07-8.72A2 2 0 012 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 9.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          <?php _e( 'Appeler Le Kasseria', 'le-kasseria' ); ?>
        </a>
        <a href="#menu" class="btn-large-outline">
          <?php _e( 'Consulter le menu', 'le-kasseria' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>
