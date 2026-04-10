<?php
/**
 * Footer — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$tel     = kasseria_opt( 'kasseria_telephone', '+33 09 56 95 90 92' );
$adresse = kasseria_opt( 'kasseria_adresse',   '9 rue Pierre Termier, 42100 Saint-Étienne' );
$maps    = kasseria_opt( 'kasseria_google_maps','https://maps.google.com/?q=9+rue+Pierre+Termier+42100+Saint-Etienne' );
?>

</main>

<footer>
  <div class="container footer-inner">
    <div>
      <div class="footer-brand">Le Kasseria</div>
      <p class="footer-info" style="margin-top:0.5rem;">
        <strong><?php _e( 'Restaurant Turc Authentique', 'le-kasseria' ); ?></strong><br>
        <a href="<?php echo esc_url( $maps ); ?>" target="_blank" rel="noopener noreferrer" style="color:inherit;">
          <?php echo esc_html( $adresse ); ?>
        </a><br>
        <?php _e( 'Ouvert 7j/7 · Midi &amp; Soir', 'le-kasseria' ); ?>
      </p>
      <p class="footer-info" style="margin-top:0.75rem;">
        <strong><?php _e( 'Horaires', 'le-kasseria' ); ?></strong><br>
        <?php
        $horaires = [
          'Lundi'    => 'Fermé',
          'Mardi'    => 'Fermé',
          'Mercredi' => '12:00–14:00, 18:00–22:00',
          'Jeudi'    => '12:00–14:00, 18:00–22:00',
          'Vendredi' => '12:00–14:00, 18:00–22:00',
          'Samedi'   => '12:00–14:00, 18:00–22:00',
          'Dimanche' => '12:00–14:00, 18:00–22:00',
        ];
        foreach ( $horaires as $jour => $heures ) :
          $ferme = ( $heures === 'Fermé' );
        ?>
          <span style="display:flex;justify-content:space-between;gap:1rem;<?php echo $ferme ? 'opacity:0.45;' : ''; ?>">
            <span style="font-weight:500;color:var(--color-text-muted);"><?php echo esc_html( $jour ); ?></span>
            <span><?php echo esc_html( $heures ); ?></span>
          </span>
        <?php endforeach; ?>
      </p>
    </div>
    <div class="footer-copy">
      <p>&copy; <?php echo date('Y'); ?> <span>Le Kasseria</span></p>
      <p style="margin-top:0.25rem;"><?php _e( 'Cuisine ottomane authentique', 'le-kasseria' ); ?></p>
      <p style="margin-top:0.5rem;">
        <a href="tel:<?php echo esc_attr( preg_replace('/\s/','',$tel) ); ?>" style="color:var(--color-primary);font-weight:600;">
          <?php echo esc_html( $tel ); ?>
        </a>
      </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
