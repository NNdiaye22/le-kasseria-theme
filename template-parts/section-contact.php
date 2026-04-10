<?php
/**
 * Section Contact — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$tel     = kasseria_opt( 'kasseria_telephone', '+33 09 56 95 90 92' );
$adresse = kasseria_opt( 'kasseria_adresse',   '9 rue Pierre Termier, 42100 Saint-Étienne' );
$maps    = kasseria_opt( 'kasseria_google_maps','https://maps.google.com/?q=9+rue+Pierre+Termier+42100+Saint-Etienne' );
$tel_href = preg_replace( '/\s/', '', $tel );
?>
<section class="contact-section" id="contact" aria-labelledby="contact-title">
  <div class="contact-cta-band">
    <div class="contact-cta-bg" aria-hidden="true">
      <img
        src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=1600&q=80&auto=format&fit=crop"
        alt=""
        width="1600" height="600"
        loading="lazy" decoding="async"
      >
      <div class="contact-cta-overlay" aria-hidden="true"></div>
    </div>
    <div class="contact-cta-inner reveal">
      <h2 id="contact-title" class="contact-cta-title"><?php _e( 'Envie d’une<br><em>table ce soir ?</em>', 'le-kasseria' ); ?></h2>
      <p><?php _e( 'Appelez-nous pour commander ou réserver. Livraison disponible à Saint-Étienne.', 'le-kasseria' ); ?></p>
      <a href="tel:<?php echo esc_attr( $tel_href ); ?>" class="btn-primary btn-primary--large">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.59 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php echo esc_html( $tel ); ?>
      </a>
    </div>
  </div>
  <div class="contact-info-bar container">
    <div class="contact-info-item reveal">
      <i data-lucide="map-pin" aria-hidden="true"></i>
      <div>
        <strong><?php _e( 'Adresse', 'le-kasseria' ); ?></strong>
        <a href="<?php echo esc_url( $maps ); ?>" target="_blank" rel="noopener noreferrer"><?php echo $adresse; ?></a>
      </div>
    </div>
    <div class="contact-info-item reveal">
      <i data-lucide="clock" aria-hidden="true"></i>
      <div>
        <strong><?php _e( 'Horaires', 'le-kasseria' ); ?></strong>
        <span><?php _e( 'Mer–Dim 12:00–14:00 / 18:00–22:00', 'le-kasseria' ); ?></span>
      </div>
    </div>
    <div class="contact-info-item reveal">
      <i data-lucide="phone" aria-hidden="true"></i>
      <div>
        <strong><?php _e( 'Téléphone', 'le-kasseria' ); ?></strong>
        <a href="tel:<?php echo esc_attr( $tel_href ); ?>"><?php echo $tel; ?></a>
      </div>
    </div>
  </div>
</section>
