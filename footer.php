<?php
/**
 * Footer — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$tel_raw  = kasseria_opt( 'kasseria_telephone', '0956959092' );
$tel_href = 'tel:+33' . ltrim( preg_replace( '/[^0-9]/', '', $tel_raw ), '0' );
$adresse  = kasseria_opt( 'kasseria_adresse',    '9 rue Pierre Termier, 42100 Saint-Étienne' );
$maps     = kasseria_opt( 'kasseria_google_maps','https://maps.google.com/?q=9+rue+Pierre+Termier+42100+Saint-Etienne' );
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
        </a>
      </p>
      <p class="footer-info" style="margin-top:0.5rem;">
        <a href="<?php echo esc_attr( $tel_href ); ?>" style="color:var(--color-primary);font-weight:600;">
          <?php echo esc_html( $tel_raw ); ?>
        </a>
      </p>
    </div>

    <div>
      <p class="footer-info"><strong><?php _e( 'Horaires', 'le-kasseria' ); ?></strong></p>
      <div class="footer-info" style="margin-top:0.5rem;display:flex;flex-direction:column;gap:0.25rem;">
        <?php foreach ( kasseria_get_horaires() as $h ) : ?>
          <span style="display:flex;justify-content:space-between;gap:1.5rem;<?php echo $h['ferme'] ? 'opacity:0.4;' : ''; ?>">
            <span style="font-weight:500;color:var(--color-text-muted);min-width:80px;"><?php echo esc_html( $h['jour'] ); ?></span>
            <span><?php echo esc_html( $h['heures'] ); ?></span>
          </span>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="footer-copy">
      <p>&copy; <?php echo date('Y'); ?> <span>Le Kasseria</span></p>
      <p style="margin-top:0.25rem;color:var(--color-text-faint);font-size:var(--text-xs);">
        <?php _e( 'Cuisine ottomane authentique · Halal certifié', 'le-kasseria' ); ?>
      </p>
      <p style="margin-top:0.5rem;font-size:var(--text-xs);color:var(--color-text-faint);">
        <?php _e( 'Thème par', 'le-kasseria' ); ?> <a href="https://github.com/NNdiaye22" target="_blank" rel="noopener noreferrer" style="color:var(--color-primary);">2N</a>
      </p>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
